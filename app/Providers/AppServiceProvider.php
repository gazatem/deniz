<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use App\Models\Block;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('block', function ($block_name) {
            $block = Block::where('block_name', $block_name)->first();
            return $block->block_value;
        });
    }
}
