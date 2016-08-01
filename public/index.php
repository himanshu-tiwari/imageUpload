<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application;

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider, [
	'twig.path' => __DIR__.'/../views'
]);

$app->register(new Silex\Provider\DoctrineServiceProvider, [
	'db.options' => [
		'driver' => 'pdo_mysql',
		'host' => '127.0.0.1',
		'dbname' => 'awesomeimage',
		'user' => 'root',
		'password' => '',
		'charset' => 'utf8',
	]
]);

$app->register(new AI\Providers\UploadcareProvider);

$app->get('/', function() use($app){
	$images = $app['db']->prepare("SELECT * FROM images");
	$images->execute();

	$images = $images->fetchAll(\PDO::FETCH_CLASS, \AI\Models\Image::class);

	return $app['twig']->render('home.twig');
});

$app->run();

?>