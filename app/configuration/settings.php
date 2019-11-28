<?php

define("BASE_URL", "http://curso-php-6-b7web.local");
define("ENVIRONMENT", "development");

global $config;
$config = array();

if (ENVIRONMENT == "development") {
	$config['dbName'] = 'b7web_curso06';
	$config['host'] = 'localhost';
	$config['dbUser'] = 'gerente_app';
	$config['dbPassword'] = 'G3r3nt3_4pp';
} else {
	$config['dbName'] = '';
	$config['host'] = '';
	$config['dbUser'] = '';
	$config['dbPassword'] = '';
}
