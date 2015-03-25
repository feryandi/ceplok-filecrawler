<?php
	require 'Setting.php';
	class Input {
		public function __construct() {
			$this->Query = "";
			$this->Setting = new Setting();
		}
	}