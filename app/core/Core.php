<?php
/**
 * Núcleo do Modelo MVC - obtem as rotas e as acções.
 */
class Core {

	function run() {

		$url = $_SERVER['REQUEST_URI'];

		if (!empty($url) && $url != '/') {

			$url = explode('/', $url);
			array_shift($url);
			$currentController = $url[0] . 'Controller';
			array_shift($url);

			if (isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			if (count($url) > 0) {
				$params = $url;
			} else {
				$params = array();
			}

		} else {

			$currentController = 'indexController';
			$currentAction = 'index';
			$params = array();

		}

		if (file_exists('app/controller/' . $currentController . '.php')) {

			require_once 'app/core/Controller.php';

			if (method_exists($currentController, $currentAction)) {
				$controller = new $currentController();
				call_user_func_array(array($controller, $currentAction), $params);	
			} else {
				header('HTTP/1.0 404 Not Found');
				readfile('404.html');
				exit();
			}

		} else {

			header('HTTP/1.0 404 Not Found');
			readfile('404.html');
			exit();

		}
		
	}

}
