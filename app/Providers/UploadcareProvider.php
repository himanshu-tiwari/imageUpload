<?php

namespace AI\Providers;

use Silex\Application;
use Silex\ServiceProviderInterface;

class UploadcareProvider implements ServiceProviderInterface
{
	public function register(Application $app)
	{
		$app['uploadcare'] = $app->share(function() use($app){
			return new \Uploadcare\Api('', '');
		});
	}

	public function boot(Application $app)
	{
		//
	}
}

?>
