<div class="row justify-content-center">
	<div class="col-12 col-md-6">
		<div class="alert <?php echo $alert; ?>">
			<?php echo $mensagem; ?>
		</div>
		<form class="" action="" method="post">
			<div class="form-group">
				<label for="nomeUsuario">Nome</label>
				<input type="text" name="nomeUsuario" id="nomeUsuario" class="form-control" aria-describedby="nomeUsuarioHelp">
				<small id="nomeUsuarioHelp" class="form-text text-muted">Nome de exibição.</small>
			</div>
			<div class="form-group">
				<label for="emailUsuario">Email</label>
				<input type="email" name="emailUsuario" id="emailUsuario" class="form-control" aria-describedby="emailUsuarioHelp">
				<small id="emailUsuarioHelp" class="form-text text-muted">Endereço de email para login.</small>
			</div>
			<div class="form-group">
				<label for="senhaUsuario">Senha</label>
				<input type="password" name="senhaUsuario" id="senhaUsuario" class="form-control" placeholder="Senha">
			</div>
			<!-- <div class="form-check">
				<label class="form-check-label">
				<input type="checkbox" class="form-check-input">
				Check me out
				</label>
			</div> -->
			<button type="submit" class="btn btn-primary">Confirmar cadastro</button>
			<a href="<?php echo BASE_URL?>" class="btn btn-outline-danger">Cancelar</a>
		</form>
	</div>
</div>
