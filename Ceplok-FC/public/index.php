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
<<<<<<< HEAD
			while ($get = fgets($pipes[1])) {
				ob_end_flush();
				echo $get;
				ob_start();
			}
=======
			echo stream_get_contents($pipes[1]);
>>>>>>> b636d7063a663875c45f81db1bfd2e1f8307216c
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
<<<<<<< HEAD
		$input->Setting->Path = 'E:/test';
		$json = exec_ceplok(json_encode(get_object_vars($input)));
		echo $json;
=======
		$input->Setting->Path = $_POST["sdir"];
		return exec_ceplok(json_encode(get_object_vars($input), JSON_UNESCAPED_SLASHES));
>>>>>>> b636d7063a663875c45f81db1bfd2e1f8307216c
	}
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		readfile(__DIR__ . '/../View/welcome.php');
	}