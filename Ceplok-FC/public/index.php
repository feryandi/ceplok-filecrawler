<?php
	require __DIR__ . '/../bootstrap/autoload.php';
	define("POLL_RATE", 0.25);
	function send_message( $message) {
	    echo "data: " . $message . PHP_EOL;
	    echo PHP_EOL;
	      
	    ob_flush();
	    flush();
	}

	function kill($process) {
    if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
        $status = proc_get_status($process);
        return exec('taskkill /F /T /PID '.$status['pid']);
    } else {
        return proc_terminate($process);
    }
}

	function exec_ceplok($input) {
		ignore_user_abort(true);
		$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"));
		$cwd = __DIR__ . '/../bin/Release/' ;
		$process = proc_open('Ceplok-FC', $descriptorspec, $pipes, $cwd);
		if (is_resource($process)) {
			fwrite($pipes[0], $input);
			fclose($pipes[0]);
			/* Return HTTP Response */
			while ( !feof($pipes[1]) && !connection_aborted() ) {
				if ( ($message = fgets($pipes[1])) !== false) {
					send_message($message);
					set_time_limit(ini_get("max_execution_time"));
				}
			}
			if (connection_aborted()) {
				kill($process);
				error_log("Connection aborted");
			}
			fclose($pipes[1]);
			$result = proc_close($process);
		}
	}
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (isset($_GET["query"])) {
			header('Content-Type: text/event-stream');
			// recommended to prevent caching of event data.
			header('Cache-Control: no-cache'); 
			$query = $_GET["query"];
			$input = new Input();
			$input->Query = $query;
			if (isset($_GET["algo"]))
				$input->Setting->Mode = 1;
			else
				$input->Setting->Mode = 0;
			$input->Setting->Exts = array(".txt", ".doc", ".docx", ".xls", ".xlsx", ".ppt", ".pptx");
			$input->Setting->Path = $_GET["sdir"];
			exec_ceplok(json_encode(get_object_vars($input)));
		}
		else {
			readfile(__DIR__ . '/../View/welcome.php');
		}
	}