<?php
	/*
	|--------------------------------------------------------------------------
	| Include the environtment variables
	|--------------------------------------------------------------------------
	|
	| Define the constants needed for our application to work
	|
	*/
	require_once 'env.php';


	/*
	|--------------------------------------------------------------------------
	| Define The Auto Loader
	|--------------------------------------------------------------------------
	|
	| Define the autoload function to automatically generate class.
	|
	*/
	function model_autoloader($class_name) {
		if (defined('__CLASSDIR__')) {
    		include __CLASSDIR__ . $class_name . '.php';
		}
	}

	/*
	|--------------------------------------------------------------------------
	| Register The Auto Loader
	|--------------------------------------------------------------------------
	|
	| After we define the autoloaders, we need to register to the PHP
	| itselves so it would work
	|
	*/

	spl_autoload_register('model_autoloader');

	/*
	|--------------------------------------------------------------------------
	| Get the Application 
	|--------------------------------------------------------------------------
	|
	| Call the application boostrap script to boot up our 
	| application.
	|
	*/
	$app = require_once __DIR__.'/../bootstrap/app.php';

	/*
	|--------------------------------------------------------------------------
	| Process the Request
	|--------------------------------------------------------------------------
	|
	| Process the get request sent to server.
	|
	*/

	$app->Run();