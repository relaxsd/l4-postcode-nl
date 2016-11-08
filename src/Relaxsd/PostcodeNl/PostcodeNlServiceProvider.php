<?php namespace Relaxsd\PostcodeNl;

use Illuminate\Support\ServiceProvider;

class PostcodeNlServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('relaxsd/postcode-nl');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'postcode-nl', function () {
				$api = new \PostcodeNl_Api_RestClient(
					\Config::get('postcode-nl::postcode-nl.app-key'),
					\Config::get('postcode-nl::postcode-nl.app-secret')
				);
				$api->setDebugEnabled(\Config::get('app.debug'));
				return $api;
			}
		);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('postcode-nl');
	}
}
