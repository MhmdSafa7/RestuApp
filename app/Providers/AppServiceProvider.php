<?php

namespace App\Providers;

use OpenAI\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            return (new Factory())->withApiKey(env('OPENAI_API_KEY'))->make();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

}
