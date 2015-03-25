<?php
	/**
	 * Singleton class
	 *
	 */
	final class App {
		/**
		 * Call this method to or get the app
		 *
		 */
		public static function Instance() {
			static $inst = null;
			if ($inst === null) {
				$inst = new App();
			}
			return $inst;
		}
		public function Run() {
			$response = $this->router->ProcessRequest();
		}
		private function __construct() {
		}
	}