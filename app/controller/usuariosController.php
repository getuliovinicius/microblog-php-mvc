<?php
/**
 * Controle do cadastro de usuários.
 */
class usuariosController extends Controller {

	private $usuario;

	public function __construct() {
		parent::__construct();
		$this->usuario = new Usuarios();
	}

	public function index($mensagem = 'Lista de usuários do MicroBlog') {
		$data = array(
			'titulo' => 'Usuários do MicroBlog!',
			'mensagem' => $mensagem,
			'alert' => 'alert-light',
			'quantidadeRegistros' => '',
			'usuarios' => ''
		);

		$this->usuario->listAll();

		if ($this->usuario->querySuccess() == 1) {
			$data['quantidadeRegistros'] = $this->usuario->queryNumRows();
			$data['usuarios'] = $this->usuario->queryResult();
		} else {
			$data['mensagem'] = 'Não existem usuários cadastrados.';
		}

		$this->loadTemplate('usuarios/usuarios', $data);
	}

	public function localizar() {
		$data = array(
			'titulo' => 'Localizar usuários do MicroBlog!',
			'mensagem' => 'Digite a Id do usuário para ver os dados.',
			'alert' => 'alert-light',
			'idUsuario' => '',
			'nomeUsuario' => '',
			'emailUsuario' => ''
		);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$idUsuario = (isset($_POST['idUsuario']) && (!empty($_POST['idUsuario']))) ? addslashes($_POST['idUsuario']) : NULL;

			if (isset($idUsuario)) {
				$this->usuario->selectById($idUsuario);

				if ($this->usuario->querySuccess() == 1) {
					$data['idUsuario'] = $this->usuario->getIdUsuario();
					$data['nomeUsuario'] = $this->usuario->getNomeUsuario();
					$data['emailUsuario'] = $this->usuario->getEmailUsuario();
				} else {
					$data['mensagem'] = 'Usuário não encontrado.';
				}
			} else {
				$data['mensagem'] = 'Ouve um erro no preenchimento do formulário!';
			}
		}

		$this->loadTemplate('usuarios/localizar', $data);
	}

	public function cadastrar() {
		$data = array(
			'titulo' => 'Cadastre-se no MicroBlog!',
			'mensagem' => 'Preencha todos os campos.',
			'alert' => 'alert-light'
		);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$nomeUsuario = (isset($_POST['nomeUsuario']) && (!empty($_POST['nomeUsuario']))) ? addslashes(strip_tags($_POST['nomeUsuario'])) : NULL;
			$emailUsuario = (isset($_POST['emailUsuario']) && (!empty($_POST['emailUsuario']))) ? addslashes($_POST['emailUsuario']) : NULL;
			$senhaUsuario = (isset($_POST['senhaUsuario']) && (!empty($_POST['senhaUsuario']))) ? md5($_POST['senhaUsuario']) : NULL;

			if (isset($nomeUsuario) && isset($emailUsuario) && isset($senhaUsuario)) {
				$this->usuario->setNomeUsuario($nomeUsuario);
				$this->usuario->setEmailUsuario($emailUsuario);
				$this->usuario->setSenhaUsuario($senhaUsuario);

				if ($this->usuario->checkEmailExists()) {
					$data['alert'] = "alert-warning";
					$data['mensagem'] = "Já existe um usuário com esse endereço de email!";
				} else {
					$idUsuario = $this->usuario->insert();
					$login = array(
						'idUsuario' => $idUsuario,
						'nomeUsuario' => $nomeUsuario,
						'emailUsuario' => $emailUsuario
					);
					$_SESSION['mbLogin'] = $login;
					header("Location: /");
				}
			} else {
				$data['alert'] = "alert-danger";
				$data['mensagem'] = "Ouve um erro no preenchimento do formulário!";
			}
		}

		$this->loadTemplate('usuarios/cadastrar', $data);
	}

	public function editar($idUsuario) {
		$data = array(
			'titulo' => 'Editar cadastro do MicroBlog!',
			'mensagem' => 'Você pode alterar o "Nome" e a "Senha".',
			'alert' => 'alert-light',
			'idUsuario' => '',
			'nomeUsuario' => '',
			'emailUsuario' => ''
		);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$idUsuario = (isset($_POST['idUsuario']) && (!empty($_POST['idUsuario']))) ? addslashes($_POST['idUsuario']) : NULL;
			$nomeUsuario = (isset($_POST['nomeUsuario']) && (!empty($_POST['nomeUsuario']))) ? addslashes($_POST['nomeUsuario']) : NULL;
			$senhaUsuario = (isset($_POST['senhaUsuario']) && (!empty($_POST['senhaUsuario']))) ? md5($_POST['senhaUsuario']) : NULL;

			if (isset($idUsuario) && isset($nomeUsuario) && isset($emailUsuario)) {
				$this->usuario->setNomeUsuario($nomeUsuario);
				$this->usuario->setSenhaUsuario($senhaUsuario);
				$this->usuario->update($idUsuario);
				header("Location: " . BASE_URL . "/usuarios/cadastro/" . $idUsuario);
			} else {
				$data['mensagem'] = "Ouve um erro no preenchimento do formulário!";
			}
		}

		$this->usuario->selectById($idUsuario);

		if ($this->usuario->querySuccess() == 1) {
			$data['idUsuario'] = $this->usuario->getIdUsuario();
			$data['nomeUsuario'] = $this->usuario->getNomeUsuario();
			$data['emailUsuario'] = $this->usuario->getEmailUsuario();
		} else {
			$data['mensagem'] = 'Usuário não encontrado!';
		}

		$this->loadTemplate('usuarios/editar', $data);
	}

	public function excluir($idUsuario) {
		$this->usuario->delete($idUsuario);
		$mensagem = 'Usuário removido.';
		header("Location: " . BASE_URL . "/usuarios");
	}

	public function cadastro($idUsuario) {
		$data = array(
			'titulo' => 'Usuário do MicroBlog: ',
			'mensagem' => 'Dados do usuário.',
			'alert' => 'alert-light',
			'idUsuario' => '',
			'nomeUsuario' => '',
			'emailUsuario' => ''
		);

		$this->usuario->selectById($idUsuario);

		if ($this->usuario->querySuccess() == 1) {
			$data['idUsuario'] = $this->usuario->getIdUsuario();
			$data['nomeUsuario'] = $this->usuario->getNomeUsuario();
			$data['emailUsuario'] = $this->usuario->getEmailUsuario();
		} else {
			$data['mensagem'] = 'Usuário não encontrado';
		}

		$this->loadTemplate('usuarios/cadastro', $data);
	}
}
