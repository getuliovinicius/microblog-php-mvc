<?php
/**
 * Modelo de dados para controle de usuários.
 */
class Usuarios extends Model {

	// Váriaveis privadas

	private $querySuccess = 0;
	private $queryNumRows;
	private $queryResult;
	private $queryIdInsert;
	private $idUsuario;
	private $nomeUsuario;
	private $emailUsuario;
	private $senhaUsuario;

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

	public function queryIdInsert() {
	    return $this->queryIdInsert;
	}

	// CRUD

	public function listAll() {
		$sql = "SELECT idUsuario, nomeUsuario, emailUsuario FROM usuarios";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$this->querySuccess = 1;
			$this->queryNumRows = $sql->rowCount();
			$this->queryResult = $sql->fetchAll();
		}
	}

	public function checkEmailExists() {
		$sql = "SELECT COUNT(emailUsuario) AS total FROM usuarios WHERE emailUsuario = ?";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($this->emailUsuario));
		$check = $sql->fetch();
		if ($check['total'] == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function selectById($idUsuario) {
		$sql = "SELECT * FROM usuarios WHERE idUsuario = ?";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($idUsuario));
		if ($sql->rowCount() == 1) {
			$this->querySuccess = 1;
			$usuario = $sql->fetch();
			$this->idUsuario = $usuario['idUsuario'];
			$this->nomeUsuario = $usuario['nomeUsuario'];
			$this->emailUsuario = $usuario['emailUsuario'];
			$this->senhaUsuario = $usuario['senhaUsuario'];
		}
	}

	public function insert() {
		$sql = "INSERT INTO usuarios (nomeUsuario, emailUsuario, senhaUsuario) VALUES (?, ?, ?)";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($this->nomeUsuario, $this->emailUsuario, $this->senhaUsuario));
		return $this->dbConnect->lastInsertId();
	}

	public function upadte($idUsuario) {
		$sql = "UPDATE usuarios SET nomeUsuario = ?, emailUsuario = ?, senhaUsuario = ? WHERE idUsuario = ?";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($this->nomeUsuario, $this->emailUsuario, $this->senhaUsuario, $idUsuario));
	}

	public function delete($idUsuario) {
		$sql = "DELETE FROM usuarios WHERE idUsuario = ?";
		$sql = $this->dbConnect->prepare($sql);
		$sql->bindValue(1, $idUsuario);
		$sql->execute();
	}

	// Login

	public function isLogged() {
		if (isset($_SESSION['mbLogin']) && !empty($_SESSION['mbLogin'])) {
			return true;
		} else {
			return false;
		}
	}

	public function newLogin() {
		$sql = "SELECT idUsuario, nomeUsuario FROM usuarios WHERE emailUsuario = ? AND senhaUsuario = ?";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($this->emailUsuario, $this->senhaUsuario));
		if ($sql->rowCount() === 1) {
			$this->querySuccess = 1;
			$usuario = $sql->fetch();
			$this->idUsuario = $usuario['idUsuario'];
			$this->nomeUsuario = $usuario['nomeUsuario'];
		}
	}

	// Encapsulamento

	public function getIdUsuario() {
		return $this->idUsuario;
	}

	public function getNomeUsuario() {
		return $this->nomeUsuario;
	}

	public function getEmailUsuario() {
		return $this->emailUsuario;
	}

	public function setNomeUsuario($nomeUsuario) {
		$this->nomeUsuario = $nomeUsuario;
	}

	public function setEmailUsuario($emailUsuario) {
		$this->emailUsuario = $emailUsuario;
	}

	public function setSenhaUsuario($senhaUsuario) {
		$this->senhaUsuario = $senhaUsuario;
	}

}
