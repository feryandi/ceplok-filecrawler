<?php
	class Router {
		public static function Get($url, $controller) {
			$this->get->url = $controller;
		}
		public static function Post($url, $controller) {
			$this->post->url = $controller;
		}
		public function ProcessRequest() {
			switch ($_SERVER["REQUEST_METHOD"]) {
				case "POST":
					
					break;
				case "GET":
					break;
				default:
					break;
			}
		}
	}