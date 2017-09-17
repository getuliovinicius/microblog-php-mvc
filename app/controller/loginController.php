<?php

/**
 * Controle da página de login
 */
class loginController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array('titulo' => 'Login do MicroBlog!');
        $this->loadTemplate('login/login', $data);
    }

}
