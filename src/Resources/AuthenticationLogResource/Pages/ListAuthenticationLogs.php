<?php

namespace FilamentPro\FilamentAuthenticationLog\Resources\AuthenticationLogResource\Pages;

use Filament\Resources\Pages\ListRecords;
use FilamentPro\FilamentAuthenticationLog\Resources\AuthenticationLogResource;

class ListAuthenticationLogs extends ListRecords
{
    protected static string $resource = AuthenticationLogResource::class;
}
