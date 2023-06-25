<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;
use Illuminate\Database\Query\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Builder::macro('search', function($field, $string){
            return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
        });
        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Settings')
                    ->icon('heroicon-s-cog'),
                // ...
            ]);
        });
    }
}
