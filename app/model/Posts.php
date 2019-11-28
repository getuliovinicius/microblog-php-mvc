<?php
/**
 * Modelo de dados para tratamento das postagens.
 */
class Posts extends Model {

	// Váriaveis privadas

	private $queryNumRows;
	private $queryResult;
	private $querySuccess = 0;
	private $post;

	// Resultados

	public function querySuccess() {
		return $this->querySuccess;
	}

	public function queryNumRows() {
		return $this->queryNumRows;
	}

	public function queryResult() {
		return $this->queryResult;
	}

	//

	public function listRecentPosts($idUsuario) {
		$sql = "SELECT U.idUsuario AS idUsuario, U.nomeUsuario AS nomeUsuario, P.dataPost AS dataPost, P.idPost AS idPost, P.post AS post FROM posts AS P INNER JOIN usuarios AS U ON P.idUsuario = U.idUsuario WHERE P.idUsuario = ? OR P.idUsuario IN (SELECT R.idUsuarioSeguido FROM relacionamentos AS R WHERE idUsuarioSeguidor = ?) ORDER BY P.dataPost DESC";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($idUsuario, $idUsuario));
		if ($sql->rowCount() > 0) {
			$this->querySuccess = 1;
			$this->queryNumRows = $sql->rowCount();
			$this->queryResult = $sql->fetchAll();
		}		
	}

	public function insert() {
		$sql = "INSERT INTO posts (idUsuario, dataPost, post) VALUES (?, NOW(), ?)";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($_SESSION['mbLogin']['idUsuario'], $this->post));
	}

	// Encapsulamento

	public function getPost() {
		return $this->post;
	}

	public function setPost($post) {
		$this->post = $post;
	}

}