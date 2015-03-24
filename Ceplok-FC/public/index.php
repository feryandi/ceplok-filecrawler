<?php
	require __DIR__ . '/../bootstrap/autoload.php';

	function send_message($mtype, $message) {
	    $d = array('message' => $message , 'mtype' => $mtype);
	      
	    echo "data: " . json_encode($d) . PHP_EOL;
	    echo PHP_EOL;
	      
	    ob_flush();
	    flush();
	}

	function exec_ceplok($input) {
		$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"));
		$cwd = __DIR__ . '/../bin/Debug/' ;
		$process = proc_open('Ceplok-FC', $descriptorspec, $pipes, $cwd);
		if (is_resource($process)) {
			fwrite($pipes[0], $input);
			fclose($pipes[0]);
			/* Return HTTP Response */
			while ($get = fgets($pipes[1])) {
				$message = fgets($pipes[1]);
				send_message($mtype, $message);			
			}
		}
		else
			return null;
	}
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (isset($_GET["query"])) {
			
			$query = $_GET["query"];
			$input = new Input();
			$input->Query = $query;
			if (isset($_GET["algo"]))
				$input->Setting->Mode = 1;
			else
				$input->Setting->Mode = 0;
			$input->Setting->Exts = array(".txt");
			$input->Setting->Path = $_GET["sdir"];
			exec_ceplok(json_encode(get_object_vars($input)));
		}
		else {
			readfile(__DIR__ . '/../View/welcome.php');
		}
	}