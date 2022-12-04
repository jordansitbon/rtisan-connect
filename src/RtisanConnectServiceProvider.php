<?php

namespace Rtisan\Connect;

use Illuminate\View\Compilers\BladeCompiler;
use Rtisan\Connect\Commands\RtisanDownloadCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rtisan\Connect\Commands\RtisanUploadCommand;

class RtisanConnectServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('rtisan-connect')
            ->hasConfigFile()
            ->hasCommand(RtisanUploadCommand::class)
            ->hasCommand(RtisanDownloadCommand::class);
    }
}
