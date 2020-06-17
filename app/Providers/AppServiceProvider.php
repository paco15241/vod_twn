<?php

namespace App\Providers;

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
        // 修改 Model Factory 所使用的 Faker 之預設語系為繁中
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('zh_TW');
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
