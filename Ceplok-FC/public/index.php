<?php
	require '../Model/Input.php';
	require '../Controller/View.php';
	function exec_ceplok($input) {
		$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"));
		$cwd = "E:/Projects/Software/Visual Studio 2013/CeplokFC/Ceplok-FC/bin/Debug";
		$process = proc_open('Ceplok-FC', $descriptorspec, $pipes, $cwd);
		if (is_resource($process)) {
			fwrite($pipes[0], $input);
			fclose($pipes[0]);

			return stream_get_contents($pipes[1]);
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
		$input->Setting->Path = 'E://Projects';
		$output = exec_ceplok(json_encode(get_object_vars($input)));
		$arr = json_decode($output);
		extract($arr);
		View::render($arr);
	}
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		readfile(__DIR__ . '/../View/welcome.php');
	}