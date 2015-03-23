<?php
	function autoload_model($class) {
		$filename = __DIR__ . '/../Model/' . $class . '.php';
		if (file_exists($filename))
			require $filename;
	}
	function autoload_controller($class) {
		$filename = __DIR__ . '/../Controller/' . $class . '.php';
		if (file_exists($filename))
			require $filename;
	}

	spl_autoload_register('autoload_model');
	spl_autoload_register('autoload_controller');