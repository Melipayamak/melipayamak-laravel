<?php
namespace Melipayamak\Laravel;
use Melipayamak\MelipayamakApi as Api;
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/config/config.php' => config_path('melipayamak.php')],'melipayamak');
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'melipayamak');    
        $this->app->singleton('melipayamak', function ($app) {
            $username = $app['config']->get('melipayamak.username');
            $password = $app['config']->get('melipayamak.password');
            return new Api($username, $password);
        });
    }
}