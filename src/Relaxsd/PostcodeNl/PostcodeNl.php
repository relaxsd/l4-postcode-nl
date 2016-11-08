<?php namespace Relaxsd\PostcodeNl;

use Illuminate\Support\Facades\Facade;

class PostcodeNl extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'postcode-nl';
	}
}
