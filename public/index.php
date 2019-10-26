<?php  
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	require '../vendor/autoload.php';
	require '../src/config/crud.php';

	$app = new \Slim\App;
	require '../src/rutas/odontologo.php';
	$app->run();

	//http://localhost/PROYECTO_REDDENTS/WEBSERVICES_REDDENTS/public/
?>