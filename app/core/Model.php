<?php

/**
 * Modelo principal - conecta a base de dados
 */
class Model {

    protected $dbConnect;

    public function __construct() {

        global $config;

        try {
            $this->dbConnect = new PDO("mysql:dbname=" . $config['dbName'] . ";host=" . $config['host'], $config['dbUser'], $config['dbPassword']);
        } catch(PDOException $error) {
            echo "<strong>The connection failed: </strong>" . $error->getMessage();
        }

    }

}
