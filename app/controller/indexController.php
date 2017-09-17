<?php

/**
 * Controle da página inicial
 */
class indexController extends Controller {

    private $login;

    public function __construct() {
        parent::__construct();

        $this->login = new Login();

        if (!$this->login->isLogged()) {
            header("Location: /login");
        }
    }

    public function index() {
        $data = array('titulo' => 'MicroBlog!');
        $this->loadTemplate('index', $data);
    }

}
