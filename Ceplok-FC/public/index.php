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
			echo stream_get_contents($pipes[1]);
		}
		else
			return null;
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$query = $_POST["query"];

		$input = new Input();
		$input->Query = $query;
		if (isset($_POST["algo"]))
			$input->Setting->Mode = 1;
		else
			$input->Setting->Mode = 0;
		$input->Setting->Exts = array(".txt");
		$input->Setting->Path = $_POST["sdir"];
		return exec_ceplok(json_encode(get_object_vars($input), JSON_UNESCAPED_SLASHES));
	}
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		readfile(__DIR__ . '/../View/welcome.php');
	}