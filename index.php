<?php
/******************************************************
 * DESCRIÇÃO: Modelo MVC                              *
 * DATA: 05/02/2017                                   *
 * @author Getulio Vinicius <getuliovinits@gmail.com> *
 ******************************************************/

session_start();
require 'app/configuration/settings.php';

spl_autoload_register(
    function ($class) {
        if (strpos($class, 'Controller') > -1) {
            if (file_exists('app/controller/' . $class . '.php')) {
                require_once 'app/controller/' . $class . '.php';
            }
        } elseif (file_exists('app/model/' . $class . '.php')) {
            require_once 'app/model/' . $class . '.php';
        } else {
            require_once 'app/core/' . $class . '.php';
        }
    }
);

$core = new Core();
$core->run();
