<?php

namespace FilamentPro\FilamentAuthenticationLog\Resources;

use FilamentPro\FilamentAuthenticationLog\Resources\AuthenticationLogResource\Pages;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog;
use Jenssegers\Agent\Agent;

class AuthenticationLogResource extends Resource
{
    protected static function getNavigationGroup(): ?string
    {
        return __('System');
    }

    protected static ?string $model = AuthenticationLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('authenticatable.name')->label(__('User'))->sortable()->searchable(),
                TextColumn::make('ip_address')->label('IP Address')->sortable()->searchable(),
                TextColumn::make('user_agent')->label('Browser')->formatStateUsing(function (string $state){
                    $agent = tap(new Agent, fn($agent) => $agent->setUserAgent($state));
                    return $agent->platform() . ' - ' . $agent->browser();
                })->sortable()->searchable(),
                TextColumn::make('location')->formatStateUsing(function ($state){
                    return $state && $state['default'] === false ? $state['city'] . ', ' . $state['state'] : '-';
                })->sortable()->searchable(),
                TextColumn::make('login_at'),
                BooleanColumn::make('login_successful'),
                TextColumn::make('logout_at'),
                BooleanColumn::make('cleared_by_user'),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthenticationLogs::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()->where('authenticatable_type', User::class)->where('authenticatable_id', auth()->user()->id);
    }
}
