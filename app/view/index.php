<div class="row">
	<div class="col-12">
		<div class="alert <?php echo $alert; ?>">
			<?php
			if (isset($mensagem))
				echo $mensagem;
			?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-8">
		<div class="card bg-light mb-3">
			<div class="card-body">
				<form class="" action="" method="post">
					<div class="form-group">
						<label for="post" class="sr-only">Post</label>
						<textarea name="post" id="post" class="form-control" rows="2" maxlength="144" placeholder="Post sua mensagem!" required></textarea>
					</div>
					<button type="submit" class="btn btn-info btn-sm">Postar</button>
				</form>
			</div>
		</div>

		<p class="h2">Últimos Posts</p>

<?php if (is_array($posts)): ?>

	<?php foreach ($posts as $value): ?>

		<div class="card">
			<div class="card-body">
				<p class="card-title h5"><?php echo $value['nomeUsuario']; ?></p>
				<p class="card-text"><?php echo $value['post']; ?></p>
				<p class="card-text"><small><?php echo date('d/m/y H:i', strtotime($value['dataPost'])); ?></small></p>
			</div>
		</div>

	<?php endforeach; ?>

<?php else: ?>

			<div class="card-body">
				<p class="card-text"><?php echo $posts; ?></p>
			</div>

<?php endif; ?>

	</div>

	<div class="col-4">
		<div class="card bg-light mb-3">
  			<div class="card-body">
				<h4 class="card-title"><?php echo $nomeUsuario; ?></h4>
				<p class="card-text">Seguindo: <?php echo $qtdeSeguidos; ?></p>
				<p class="card-text">Seguindores: <?php echo $qtdeSeguidores; ?></p>
  			</div>
		</div>
		<div class="card bg-light mb-3">
			<div class="card-body">
				<h4 class="card-title">Sugestões para seguir</h4>

<?php if (is_array($sugestoes)): ?>

			</div>

			<ul class="list-group list-group-flush">

	<?php foreach ($sugestoes as $value): ?>
			
				<li class="list-group-item">
					<?php echo $value['nomeUsuario']; ?> <a href="/index/seguir/<?php echo $value['idUsuario']; ?>" class="badge badge-info">Seguir</a>
				</li>

	<?php endforeach; ?>

			</ul>

<?php else: ?>
			
				<p class="card-text"><?php echo $sugestoes; ?></p>
			</div>

<?php endif; ?>
			
		</div>
	</div>

	</div>
</div>