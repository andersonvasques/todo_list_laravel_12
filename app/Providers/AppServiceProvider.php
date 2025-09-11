<?php

namespace App\Providers;

use App\Repositories\TarefaEloquentORM;
use App\Repositories\TarefaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            TarefaRepositoryInterface::class,
            TarefaEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
