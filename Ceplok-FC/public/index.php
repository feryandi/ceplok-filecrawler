<?php
	require __DIR__ . '/../bootstrap/autoload.php';
	function exec_ceplok($input) {
		$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"));
		$cwd = __DIR__ . '/../bin/Debug/' ;
		$process = proc_open('Ceplok-FC', $descriptorspec, $pipes, $cwd);
		if (is_resource($process)) {
			fwrite($pipes[0], $input);
			fclose($pipes[0]);
			/* Return HTTP Response */
			while ($get = fgets($pipes[1])) {
				ob_end_flush();
				echo $get;
				ob_start();
			}
		}
		else
			return null;
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$query = $_POST["query"];
		$input = new Input();
		$input->Query = $query;
		$input->Setting->Mode = 0;
		$input->Setting->Exts = array(".txt");
		$input->Setting->Path = 'E:/test';
		$json = exec_ceplok(json_encode(get_object_vars($input)));
		echo $json;
	}
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		readfile(__DIR__ . '/../View/welcome.php');
	}