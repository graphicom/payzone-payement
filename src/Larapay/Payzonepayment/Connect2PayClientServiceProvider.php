<?php
namespace Larapay\PayzoneLaravel;
use Illuminate\Support\ServiceProvider;

class Connect2PayClientServiceProvider extends ServiceProvider {
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['connect2payclient'] = $this->app->share(function($app)
        {
            return new Connect2PayClient();
        });
        $this->publishes([
            __DIR__.'/../../config/configuration.php' => config_path('payzonelaravel.php'),
        ]);
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('connect2payclient');
    }
}