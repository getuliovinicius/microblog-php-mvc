<?php

/**
 * Controle da página inicial
 */
class indexController extends Controller {

    private $login;
	private $index;

    public function __construct() {
        parent::__construct();

        $this->login = new Login();

        if (!$this->login->isLogged()) {
            header("Location: /login");
        } else {
			$this->index = new Index();
		}
    }

    public function index() {
		$data = array(
			'titulo' => 'Bem vindo ao MicroBlog!',
			'mensagem' => '',
			'alert' => 'alert-light',
			'idUsuario' => $_SESSION['mbLogin']['idUsuario'],
			'nomeUsuario' => $_SESSION['mbLogin']['nomeUsuario'],
			'emailUsuario' => $_SESSION['mbLogin']['emailUsuario']
		);
        $this->loadTemplate('index', $data);
    }

}
