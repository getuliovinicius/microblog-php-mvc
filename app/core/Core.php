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

        require_once 'app/core/Controller.php';

        $controller = new $currentController();
        call_user_func_array(array($controller, $currentAction), $params);

    }

}
