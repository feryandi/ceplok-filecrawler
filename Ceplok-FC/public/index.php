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
		//$cwd = __DIR__ . '/../bin/Debug/' ;
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
			$input->Setting->Mode = $_GET["algo"];

			/*Extension*/
			$textType = array(".asp", ".css", ".js", ".acgi", ".htm", ".html", ".htmls", ".htx", ".shtml", ".js", ".mcf", ".pas", ".c", ".c++", ".cc", ".com", ".conf", ".cxx", ".def", ".f", ".f90", ".for", ".g", ".h", ".hh", ".idc", ".jav", ".java", ".list", ".log", ".lst", ".m", ".mar", ".pl", ".sdml", ".text", ".txt", ".rt", ".rtf", ".rtx", ".wsc", ".sgm", ".sgml", ".tsv", ".uni", ".unis", ".uri", ".uris", ".abc", ".flx", ".rt", ".wml", ".wmls", ".htt", ".asm", ".s", ".aip", ".c", ".cc", ".cpp", ".htc", ".f", ".f77", ".f90", ".for", ".h", ".hh", ".jav", ".java", ".lsx", ".m", ".xml", ".p", ".hlb", ".csh", ".el", ".scm", ".ksh", ".lsp", ".pl", ".pm", ".py", ".rexx", ".scm", ".sh", ".tcl", ".tcsh", ".zsh", ".shtml", ".ssi", ".etx", ".sgm", ".sgml", ".spc", ".talk", ".uil", ".uu", ".uue", ".vcs", ".txt");
			$docType = array(".doc", ".docx");
			$xlsType = array(".xls", ".xlsx");
			$pptType = array(".ppt", ".pptx");

			$combination = array();

			if (isset($_GET["ext-txt"]) && $_GET["ext-txt"] == 1) {
				$combination = array_merge($combination, $textType);
			}

			if (isset($_GET["ext-doc"]) && $_GET["ext-doc"] == 1) {
				$combination = array_merge($combination, $docType);
			}

			if (isset($_GET["ext-xls"]) && $_GET["ext-xls"] == 1) {
				$combination = array_merge($combination, $xlsType);
			}

			if (isset($_GET["ext-ppt"]) && $_GET["ext-ppt"] == 1) {
				$combination = array_merge($combination, $pptType);
			}

			$input->Setting->Exts = $combination;
			$input->Setting->Path = $_GET["sdir"];
			exec_ceplok(json_encode(get_object_vars($input)));
		}
		else {
			readfile(__DIR__ . '/../View/welcome.php');
		}
	}