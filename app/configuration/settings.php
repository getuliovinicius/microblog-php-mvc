<?php

define("BASE_URL", "");
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
