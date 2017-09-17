<?php

/**
 * Controle principal da aplicacação responsável por carregar as páginas.
 */
class Controller {

	public function __construct() {

	}

	// public function loadView($viewName, $viewData = array()) {
	//     extract($viewData);
	//     include 'app/view/' . $viewName . '.php';
	// }

	public function loadTemplate($viewName, $viewData = array()) {
		include 'app/view/template.php';
	}

	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		include 'app/view/' . $viewName . '.php';
	}

}
