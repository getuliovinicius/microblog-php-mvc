    <h1><?php echo $titulo; ?></h1>
	<hr>
	<div class="mensagem">
		<?php echo $mensagem; ?>
	</div>
	<form class="" action="" method="post">
		Nome:<br>
		<input type="text" name="nomeUsuario"><br><br>
		E-mail:<br>
		<input type="email" name="emailUsuario"><br><br>
		Senha:<br>
		<input type="password" name="senhaUsuario"><br><br>
		<input type="submit" name="cadastrar" value="Confirmar Cadastro"> - <a href="<?php echo BASE_URL?>/">Cancelar</a>
	</form>
