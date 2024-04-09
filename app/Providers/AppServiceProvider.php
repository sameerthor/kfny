<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

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
        //
        Builder::macro('patientsearch', function ($attributes) {

            $this->where(
                function ($query) use ($attributes) {
                    foreach ($attributes as $key => $val) {
                        $query->orWhere($key, 'LIKE', $val);
                    }
                }
            );
            return $this;
        });
        Builder::macro('search', function ($attributes) {

            $this->orWhere(
                function ($query) use ($attributes) {
                    foreach ($attributes as $key => $val) {
                        $query->orWhere($key, 'LIKE', $val);
                    }
                }
            );
            return $this;
        });
    }
}
