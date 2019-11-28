<?php
/**
 * Modelo de dados para tratamento das relacoes entre os usuários.
 */
class Relacionamentos extends Model {

	// Váriaveis privadas

	private $queryNumRows;
	private $queryResult;
	private $querySuccess = 0;

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

	public function qtdeSeguidos($idUsuario) {
		$sql = "SELECT COUNT(*) AS qtdeSeguidos FROM relacionamentos WHERE idUsuarioSeguidor = ?";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($idUsuario));
		$total = $sql->fetch();
		return $total['qtdeSeguidos'];
	}

	public function qtdeSeguidores($idUsuario) {
		$sql = "SELECT COUNT(*) AS qtdeSeguidores FROM relacionamentos WHERE idUsuarioSeguido = ?";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($idUsuario));
		$total = $sql->fetch();
		return $total['qtdeSeguidores'];
	}

	public function sugestoes($idUsuario) {
		$sql = "SELECT DISTINCT idUsuario, nomeUsuario FROM usuarios WHERE idUsuario NOT IN (SELECT idUsuarioSeguido FROM relacionamentos WHERE idUsuarioSeguidor = ?) AND idUsuario <> ? LIMIT 5";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($idUsuario, $idUsuario));
		if ($sql->rowCount() > 0) {
			$this->querySuccess = 1;
			$this->queryNumRows = $sql->rowCount();
			$this->queryResult = $sql->fetchAll();
		}
	}

	public function seguir($idUsuarioSeguidor, $idUsuarioSeguido) {
		$sql = "INSERT INTO relacionamentos (idUsuarioSeguidor, idUsuarioSeguido) VALUES (?, ?)";
		$sql = $this->dbConnect->prepare($sql);
		$sql->execute(array($idUsuarioSeguidor, $idUsuarioSeguido));
	}

}
