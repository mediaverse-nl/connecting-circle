<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
//        $this->app->bind('path.public', function() {
//            return base_path('../../public_html');
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        config(['captcha.secret' => getSetting('NOCAPTCHA_SECRET')]);
//        config(['captcha.sitekey' => getSetting('NOCAPTCHA_SITEKEY')]);

        Schema::defaultStringLength(191);
    }
}
