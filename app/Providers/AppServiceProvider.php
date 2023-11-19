<?php

namespace App\Providers;

use Filament\Forms\Components\Component;
use Filament\Forms\Form;
use Filament\Tables\Columns\Column;
use Filament\Tables\Table;
use Illuminate\Support\ServiceProvider;

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
        Column::configureUsing(fn(Column $item)=>$item->translateLabel());
        Component::configureUsing(fn(Component $item)=>$item->translateLabel());
        Table::$defaultDateDisplayFormat = 'd/m/Y';
    }
}
