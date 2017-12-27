<?php

define("BASE_URL", "http://curso-php-6-b7web.local");
define("ENVIRONMENT", "development");

global $config;
$config = array();

if (ENVIRONMENT == "development") {
	$config['dbName'] = '';
	$config['host'] = '';
	$config['dbUser'] = '';
	$config['dbPassword'] = '';
} else {
	$config['dbName'] = '';
	$config['host'] = '';
	$config['dbUser'] = '';
	$config['dbPassword'] = '';
}
