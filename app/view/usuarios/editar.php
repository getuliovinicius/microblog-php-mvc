<?php
/*
 * DESCRIÇÃO: Página de atualizacao cadastro de usuarios do Modelo MVC - Curso B7WEB
 * DATA: 06/02/2017
 * @author Getulio Vinicius <getuliovinits@gmail.com>
 */
?>

<h1>CURSO B7WEB - Modelo MVC - USUÁRIOS - EDITAR</h1>
<hr>
<h2>Editar usuário</h2>
<form method="POST">
	Nome:<br>
	<input type="text" name="usuarioNome" value="<?php echo $usuarioNome; ?>"><br><br>
	E-mail:<br>
	<input type="text" name="usuarioEmail" value="<?php echo $usuarioEmail; ?>"><br><br>
    Senha:<br>
	<input type="password" name="usuarioSenha"><br><br>
	<input type="submit" name="atualizar" value="Atualizar">
</form>
<hr>
<pre>
	<a href="<?php echo BASE_URL?>/usuarios"><<< Voltar</a>
</pre>
