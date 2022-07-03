<?php

namespace App\Providers;

use Wonde\Client as WondeClient;
use Illuminate\Support\ServiceProvider;
// use App\Repositories\WondeApiRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(WondeClient::class, function () {
            $client = new WondeClient(env('WONDE_API_TOKEN'));
            return $client;
        });

        $this->app->bind(TeacherFetcherService::class, function ($app) {
            return new TeacherFetcherService($app->make(WondeClient::class));
        });

        $this->app->bind(ClassFetcherService::class, function ($app) {
            return new ClassFetcherService($app->make(WondeClient::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
