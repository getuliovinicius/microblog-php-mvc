<?php
/**
 * Controle da página de login
 */
class loginController extends Controller {

	private $usuario;
	private $data = array();

	public function __construct() {
		parent::__construct();
		$this->usuario = new Usuarios();
	}

	public function index() {
		$this->data['titulo'] = 'MicroBlog! - Login';
		$this->data['alert'] = 'alert-light';
		$this->data['mensagem'] = '';

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$emailUsuario = (isset($_POST['emailUsuario']) && (!empty($_POST['emailUsuario']))) ? addslashes($_POST['emailUsuario']) : NULL;
			$senhaUsuario = (isset($_POST['senhaUsuario']) && (!empty($_POST['senhaUsuario']))) ? md5($_POST['senhaUsuario']) : NULL;

			if (isset($emailUsuario) && isset($senhaUsuario)) {
				$this->usuario->setEmailUsuario($emailUsuario);
				$this->usuario->setSenhaUsuario($senhaUsuario);
				$this->usuario->newLogin();

				if ($this->usuario->querySuccess() === 1) {
					$login = array(
						'idUsuario' => $this->usuario->getIdUsuario(),
						'nomeUsuario' => $this->usuario->getNomeUsuario(),
						'emailUsuario' => $this->usuario->getEmailUsuario()
					);
					$_SESSION['mbLogin'] = $login;
					header("Location: /");
				} else {
					$this->data['alert'] = "alert-warning";
					$this->data['mensagem'] = 'Usuário não encontrado.';
				}
			} else {
				$this->data['alert'] = "alert-danger";
				$this->data['mensagem'] = 'Ouve um erro no preenchimento do formulário!';
			}
		}

		$this->loadTemplate('login/login', $this->data);
	}

	public function sair() {
		unset($_SESSION['mbLogin']);
		header("Location: /login");
	}

}
