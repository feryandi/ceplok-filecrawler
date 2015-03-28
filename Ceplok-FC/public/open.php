<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (isset($_GET["path"])) {
			$input = $_GET["path"];
			$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"));
			$cwd = __DIR__ . '/../../Ceplok-OP/bin/Release/' ;
			$process = proc_open('Ceplok-OP', $descriptorspec, $pipes, $cwd);
			if (is_resource($process)) {
				fwrite($pipes[0], $input);
				fclose($pipes[0]);
			}
		}
		else {
			header('Location: index.php');
			exit;
		}
	}