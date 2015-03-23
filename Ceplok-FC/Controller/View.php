<?php
	class View {
	    static function render($file, $variables = array()) {
	        extract($variables);

	       	ob_start();
	        include __DIR__ . '/../View/' . $file;
	        $renderedView = ob_get_clean();

	        return $renderedView;
	    }
	}