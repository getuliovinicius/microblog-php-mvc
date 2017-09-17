<div class="row justify-content-center">
	<div class="col-12 col-md-6">
		<div class="alert <?php echo $alert; ?>">
			<?php echo $mensagem; ?>
		</div>
		<form class="" action="" method="post">
			<div class="form-group">
				<label for="emailUsuario" class="sr-only">Login</label>
				<input type="email" name="emailUsuario" id="emailUsuario" class="form-control" aria-describedby="emailUsuarioHelp" placeholder="Entre com o email" required>
				<small id="emailUsuario" class="form-text text-muted">Por enquanto só permitimos login com email.</small>
			</div>
			<div class="form-group">
				<label for="senhaUsuario" class="sr-only">Senha</label>
				<input type="password" name="senhaUsuario" id="senhaUsuario" class="form-control" placeholder="Senha" required>
			</div>
			<!-- <div class="form-check">
				<label class="form-check-label">
				<input type="checkbox" class="form-check-input">
				Check me out
				</label>
			</div> -->
			<button type="submit" class="btn btn-primary">Entrar</button>
			<a href="usuarios/cadastrar" class="btn btn-outline-success">Cadastre-se</a>
		</form>
	</div>
</div>
