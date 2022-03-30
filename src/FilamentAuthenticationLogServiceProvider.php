<?php

namespace FilamentPro\FilamentAuthenticationLog;

use Filament\PluginServiceProvider;
use FilamentPro\FilamentAuthenticationLog\Resources\AuthenticationLogResource;
use Spatie\LaravelPackageTools\Package;
use FilamentPro\FilamentAuthenticationLog\Commands\FilamentAuthenticationLogCommand;

class FilamentAuthenticationLogServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        AuthenticationLogResource::class
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-authentication-log')
            ->hasConfigFile()
            ->hasCommand(FilamentAuthenticationLogCommand::class);
    }
}
