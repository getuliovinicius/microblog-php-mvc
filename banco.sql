CREATE DATABASE b7web_curso06

USE b7web_curso06

CREATE TABLE usuarios (
	idUsuario INT AUTO_INCREMENT NOT NULL,
	nomeUsuario VARCHAR(100),
	emailUsuario VARCHAR(100),
	senhaUsuario VARCHAR(32),
	PRIMARY KEY (idUsuario)
)

CREATE TABLE posts (
	idPost INT AUTO_INCREMENT NOT NULL,
	idUsuario INT NOT NULL,
	dataPost DATETIME,
	post TEXT,
	PRIMARY KEY (idPost),
	FOREIGN KEY (idUsuario) REFERENCES usuarios (idUsuario)
)

CREATE TABLE relacionamentos (
	idUsuarioSeguidor INT NOT NULL,
	idUsuarioSeguido INT NOT NULL,
	PRIMARY KEY (idUsuarioSeguidor, idUsuarioSeguido),
	FOREIGN KEY (idUsuarioSeguidor) REFERENCES usuarios (idUsuario),
	FOREIGN KEY (idUsuarioSeguido) REFERENCES usuarios (idUsuario)
)