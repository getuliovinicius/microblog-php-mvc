<?php
/**
 * Controle do cadastro de usuários.
 */
class usuariosController extends Controller {

	private $query;

	public function __construct() {
		parent::__construct();
		$this->query = new Usuarios();
	}

	public function index($mensagem = 'Lista de usuários do MicroBlog') {
		$data = array(
			'titulo' => 'Usuários do MicroBlog!',
			'mensagem' => $mensagem,
			'alert' => 'alert-light',
			'quantidadeRegistros' => '',
			'usuarios' => ''
		);

		$this->query->queryListAll();

		if ($this->query->querySuccess() == 1) {
			$data['quantidadeRegistros'] = $this->query->queryNumRows();
			$data['usuarios'] = $this->query->queryResult();
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
				$this->query->querySelectById($idUsuario);

				if ($this->query->querySuccess() == 1) {
					$data['idUsuario'] = $this->query->getIdUsuario();
					$data['nomeUsuario'] = $this->query->getNomeUsuario();
					$data['emailUsuario'] = $this->query->getEmailUsuario();
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
			$nomeUsuario = (isset($_POST['nomeUsuario']) && (!empty($_POST['nomeUsuario']))) ? addslashes($_POST['nomeUsuario']) : NULL;
			$emailUsuario = (isset($_POST['emailUsuario']) && (!empty($_POST['emailUsuario']))) ? addslashes($_POST['emailUsuario']) : NULL;
			$senhaUsuario = (isset($_POST['senhaUsuario']) && (!empty($_POST['senhaUsuario']))) ? md5($_POST['senhaUsuario']) : NULL;

			if (isset($nomeUsuario) && isset($emailUsuario) && isset($senhaUsuario)) {
				$this->query->setNomeUsuario($nomeUsuario);
				$this->query->setEmailUsuario($emailUsuario);
				$this->query->setSenhaUsuario($senhaUsuario);

				if ($this->query->queryCheckEmailExists()) {
					$data['mensagem'] = "Já existe um usuário com esse endereço de email!";
					$data['alert'] = "alert-warning";
				} else {
					$_SESSION['mbLogin'] = $this->query->queryInsert();
					header("Location: /");
				}
			} else {
				$data['mensagem'] = "Ouve um erro no preenchimento do formulário!";
				$data['alert'] = "alert-danger";
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
				$this->query->setNomeUsuario($nomeUsuario);
				$this->query->setSenhaUsuario($senhaUsuario);
				$this->query->queryUpadte($idUsuario);
				header("Location: " . BASE_URL . "/usuarios/cadastro/" . $idUsuario);
			} else {
				$data['mensagem'] = "Ouve um erro no preenchimento do formulário!";
			}
		}

		$this->query->querySelectById($idUsuario);

		if ($this->query->querySuccess() == 1) {
			$data['idUsuario'] = $this->query->getIdUsuario();
			$data['nomeUsuario'] = $this->query->getNomeUsuario();
			$data['emailUsuario'] = $this->query->getEmailUsuario();
		} else {
			$data['mensagem'] = 'Usuário não encontrado!';
		}

		$this->loadTemplate('usuarios/editar', $data);
	}

	public function excluir($idUsuario) {
		$this->query->queryDelete($idUsuario);
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

		$this->query->querySelectById($idUsuario);

		if ($this->query->querySuccess() == 1) {
			$data['idUsuario'] = $this->query->getIdUsuario();
			$data['nomeUsuario'] = $this->query->getNomeUsuario();
			$data['emailUsuario'] = $this->query->getEmailUsuario();
		} else {
			$data['mensagem'] = 'Usuário não encontrado';
		}

		$this->loadTemplate('usuarios/cadastro', $data);
	}
}
