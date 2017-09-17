<?php
/**
 * Controle da página de login
 */
class loginController extends Controller {

	private $queryNewLogin;

	public function __construct() {
		parent::__construct();
		$this->queryNewLogin = new Login();
	}

	public function index() {
		$data = array(
			'titulo' => 'MicroBlog! - Login',
			'mensagem' => '',
			'alert' => 'alert-light',
		);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$emailUsuario = (isset($_POST['emailUsuario']) && (!empty($_POST['emailUsuario']))) ? addslashes($_POST['emailUsuario']) : NULL;
			$senhaUsuario = (isset($_POST['senhaUsuario']) && (!empty($_POST['senhaUsuario']))) ? md5($_POST['senhaUsuario']) : NULL;

			if (isset($emailUsuario) && isset($senhaUsuario)) {
				$this->queryNewLogin->setEmailUsuario($emailUsuario);
				$this->queryNewLogin->setSenhaUsuario($senhaUsuario);
				$this->queryNewLogin->queryLogin();

				if ($this->queryNewLogin->querySuccess() === 1) {
					$login = array(
						'idUsuario' => $this->queryNewLogin->getIdUsuario(),
						'nomeUsuario' => $this->queryNewLogin->getNomeUsuario(),
						'emailUsuario' => $this->queryNewLogin->getEmailUsuario()
					);
					$_SESSION['mbLogin'] = $login;
					header("Location: /");
				} else {
					$data['mensagem'] = 'Usuário não encontrado.';
					$data['alert'] = "alert-warning";
				}
			} else {
				$data['mensagem'] = 'Ouve um erro no preenchimento do formulário!';
				$data['alert'] = "alert-danger";
			}
		}

		$this->loadTemplate('login/login', $data);
	}

	public function sair() {
		unset($_SESSION['mbLogin']);
		header("Location: /login");
	}

}
