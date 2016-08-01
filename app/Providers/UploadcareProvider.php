<?php

namespace AI\Providers;

use Silex\Application;
use Silex\ServiceProviderInterface;

class UploadcareProvider implements ServiceProviderInterface
{
	public function register(Application $app)
	{
		$app['uploadcare'] = $app->share(function() use($app){
			return new \Uploadcare\Api('ab6c0c25b6df79dc371c', '430b4b08daa2d260b843');
		});
	}

	public function boot(Application $app)
	{
		//
	}
}

?>