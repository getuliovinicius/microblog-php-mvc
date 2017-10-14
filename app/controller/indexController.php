<?php
/**
 * Controle da página inicial
 */
class indexController extends Controller {

	private $relacionamento;
	private $usuario;
	private $post;
	private $data = array();

	public function __construct() {
		parent::__construct();

		$this->usuario = new Usuarios();

		if ($this->usuario->isLogged()) {
			$this->relacionamento = new Relacionamentos();
			$this->post = new Posts();
		} else {
			header("Location: /login");
		}
	}

	public function index() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$post = (isset($_POST['post']) && (!empty($_POST['post']))) ? addslashes($_POST['post']) : NULL;

			if (isset($post)) {
				$this->post->setPost($post);
				$this->post->insert();
				$this->data['alert'] = "alert-success";
				$this->data['mensagem'] = "Nova mensagem postada com sucesso!";
			} else {
				$this->data['alert'] = "alert-danger";
				$this->data['mensagem'] = "Ouve um erro no preenchimento do formulário!";
			}
		}

		$this->relacionamento->sugestoes($_SESSION['mbLogin']['idUsuario']);

		if ($this->relacionamento->querySuccess() == 1) {
			$sugestoes = $this->relacionamento->queryResult();
		} else {
			$sugestoes = 'Não há sugestões!';
		}

		$this->post->listRecentPosts($_SESSION['mbLogin']['idUsuario']);

		if ($this->post->querySuccess() == 1) {
			$posts = $this->post->queryResult();
		} else {
			$posts = 'Não há postagens!';
		}

		$this->data['titulo'] = 'Bem vindo ao MicroBlog!';
		$this->data['idUsuario'] = $_SESSION['mbLogin']['idUsuario'];
		$this->data['nomeUsuario'] = $_SESSION['mbLogin']['nomeUsuario'];
		$this->data['emailUsuario'] = $_SESSION['mbLogin']['emailUsuario'];
		$this->data['qtdeSeguidos'] = $this->relacionamento->qtdeSeguidos($_SESSION['mbLogin']['idUsuario']);
		$this->data['qtdeSeguidores'] = $this->relacionamento->qtdeSeguidores($_SESSION['mbLogin']['idUsuario']);
		$this->data['sugestoes'] = $sugestoes;
		$this->data['posts'] = $posts;

		$this->loadTemplate('index', $this->data);
	}

	public function seguir($idUsuario) {
		$idUsuarioSeguido = (!empty($idUsuario)) ? addslashes($idUsuario) : NULL;

		if (isset($idUsuarioSeguido)) {
			$this->usuario->selectById($idUsuarioSeguido);

			if ($this->usuario->querySuccess() == 1) {
				$this->relacionamento->seguir($_SESSION['mbLogin']['idUsuario'], $idUsuarioSeguido);
				$this->data['alert'] = 'alert-success';
				$this->data['mensagem'] = 'OK! Agora você está seguindo ' . $this->usuario->getNomeUsuario() . '.';
			} else {
				$this->data['alert'] = 'alert-danger';
				$this->data['mensagem'] = 'Erro: O usuário que tentou seguir não existe.';
			}

			$this->index();
			/*header("Location: /");*/
		}
	}

}
