<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;
use Intervention\Image\Interfaces\ImageManagerInterface;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ImageManagerInterface::class, function () {
            return new ImageManager(new GdDriver());
            // lub: return new ImageManager(new ImagickDriver());
        });
    }
}
