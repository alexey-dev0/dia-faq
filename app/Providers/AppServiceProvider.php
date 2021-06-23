<?php

namespace App\Providers;

use Blade;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        Blade::directive('log', fn($expression) => "<?php info($expression) ?>");

        Builder::macro('search', function($field, $string) {
            return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
        });
    }
}
