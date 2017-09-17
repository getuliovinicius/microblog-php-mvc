<?php
/**
 * Modelo de dados para login
 */
class Login extends Model {

	// Váriaveis privadas

	private $querySuccess = 0;
	private $idUsuario;
	private $nomeUsuario;
	private $emailUsuario;
	private $senhaUsuario;

	// Resultados

	public function querySuccess() {
		return $this->querySuccess;
	}

	public function isLogged() {
		if (isset($_SESSION['mbLogin']) && !empty($_SESSION['mbLogin'])) {
			return true;
		} else {
			return false;
		}
	}

	public function queryLogin() {
		// echo $this->emailUsuario . ' - ' . $this->senhaUsuario;
		// exit;
		$sql = "SELECT idUsuario, nomeUsuario FROM usuarios WHERE emailUsuario = ? AND senhaUsuario = ?";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($this->emailUsuario, $this->senhaUsuario));
		if ($sql->rowCount() == 1) {
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
