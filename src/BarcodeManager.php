<?php

namespace AgeekDev\Barcode;

use AgeekDev\Barcode\Contracts\Factory;
use AgeekDev\Barcode\Contracts\ImageType;
use AgeekDev\Barcode\Drivers\DynamicHTML;
use AgeekDev\Barcode\Drivers\HTML;
use AgeekDev\Barcode\Drivers\JPG;
use AgeekDev\Barcode\Drivers\PNG;
use AgeekDev\Barcode\Drivers\SVG;
use AgeekDev\Barcode\Enums\BarcodeType;
use AgeekDev\Barcode\Enums\Type;
use AgeekDev\Barcode\Exceptions\BarcodeException;
use Closure;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Str;
use InvalidArgumentException;

class BarcodeManager implements Factory
{
    /**
     * The container instance.
     */
    protected Container $container;

    /**
     * The configuration repository instance.
     *
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected mixed $config;

    /**
     * The registered custom driver creators.
     */
    protected array $customCreators = [];

    /**
     * The array of created "drivers".
     */
    protected array $imageTypes = [];

    /**
     * Create a new manager instance.
     *
     * @throws BindingResolutionException
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->config = $container->make('config');
    }

    /**
     * Get a image type instance.
     */
    public function imageType(?string $name = null): ImageType
    {
        $name = $name ?: $this->getDefaultDriver();

        // If the given driver has not been created before, we will create the instances
        // here and cache it, so we can return it next time very quickly. If there is
        // already a driver created by this name, we'll just return that instance.
        if (! isset($this->imageTypes[$name])) {
            $this->imageTypes[$name] = $this->createDriver($name);
        }

        return $this->imageTypes[$name];
    }

    /**
     * Create a new driver instance.
     *
     * @throws InvalidArgumentException
     */
    protected function createDriver(string $driver): ImageType
    {
        // First, we will determine if a custom driver creator exists for the given driver and
        // if it does not we will check for a creator method for the driver. Custom creator
        // callbacks allow developers to build their own "drivers" easily using Closures.
        if (isset($this->customCreators[$driver])) {
            return $this->callCustomCreator($driver);
        }

        $method = 'create'.Str::studly($driver).'Driver';

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new InvalidArgumentException("ImageType [$driver] not supported.");
    }

    /**
     * Call a custom driver creator.
     */
    protected function callCustomCreator(string $driver): ImageType
    {
        return $this->customCreators[$driver]($this->container);
    }

    /**
     * Create an HTML instance.
     */
    public function createHtmlDriver(): ImageType
    {
        return new HTML;
    }

    /**
     * Create an DynamicHTML instance.
     */
    public function createDynamicHtmlDriver(): ImageType
    {
        return new DynamicHTML;
    }

    /**
     * Create an JPG instance.
     */
    public function createJpgDriver(): ImageType
    {
        return new JPG;
    }

    /**
     * Create an PNG instance.
     */
    public function createPngDriver(): ImageType
    {
        return new PNG;
    }

    /**
     * Create an SVG instance.
     */
    public function createSvgDriver(): ImageType
    {
        return new SVG;
    }

    /**
     * Generate Barcode.
     */
    public function generate(string $text): string
    {
        return $this->imageType()->generate($text);
    }

    /**
     * Set the barcode type.
     */
    public function type(BarcodeType|Type $type): ImageType
    {
        return $this->imageType()->type($type);
    }

    /**
     * Set the barcode foreground color.
     */
    public function foregroundColor(string $foregroundColor): ImageType
    {
        return $this->imageType()->foregroundColor($foregroundColor);
    }

    /**
     * Set the barcode height.
     */
    public function height(int $height): ImageType
    {
        return $this->imageType()->height($height);
    }

    /**
     * Set the barcode width factor.
     */
    public function widthFactor(int $widthFactor): ImageType
    {
        return $this->imageType()->widthFactor($widthFactor);
    }

    /**
     * Force the use of Imagick image extension
     *
     * @throws BarcodeException
     */
    public function useImagick(): ImageType
    {
        if (method_exists($this->imageType(), 'useImagick')) {
            if (! extension_loaded('imagick')) {
                throw new BarcodeException('The imagick is not installed!');
            }

            return $this->imageType()->useImagick();
        }

        throw new BarcodeException('This image type does not support useImagick function.');
    }

    /**
     * Force the use of the GD image library
     *
     * @throws BarcodeException
     */
    public function useGd(): ImageType
    {
        if (method_exists($this->imageType(), 'useGd')) {
            if (! function_exists('imagecreate')) {
                throw new BarcodeException('The GD is not installed!');
            }

            return $this->imageType()->useGd();
        }

        throw new BarcodeException('This image type does not support useGd function.');
    }

    /**
     * Get the default driver name.
     */
    public function getDefaultDriver(): string
    {
        return $this->config->get('barcode.image_type', 'png');
    }

    /**
     * Register a custom driver creator Closure.
     */
    public function extend(string $imageType, Closure $callback): self
    {
        $this->customCreators[$imageType] = $callback;

        return $this;
    }

    /**
     * Get the container instance used by the manager.
     */
    public function getContainer(): Container
    {
        return $this->container;
    }

    /**
     * Set the container instance used by the manager.
     */
    public function setContainer(Container $container): self
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Unset the given disk instances.
     */
    public function forgetImageType(array|string $imageType): self
    {
        foreach ((array) $imageType as $imageTypeName) {
            unset($this->imageTypes[$imageTypeName]);
        }

        return $this;
    }

    /**
     * Dynamically call the default driver instance.
     *
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        return $this->imageType()->$method(...$parameters);
    }
}
