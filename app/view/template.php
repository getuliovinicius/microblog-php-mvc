<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $viewData['titulo']; ?></title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>/public/vendor/bootstrap/dist/css/bootstrap.css">
	<!-- outro css -->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>/public/assets/css/main.css">
</head>

<body>
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="/">MicroBlog!</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Navegação">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarContent">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="/timeline">Timeline <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/perfil">Perfil</a>
				</li>
			</ul>
			<span class="navbar-text">
				<?php if (isset($viewData['nomeUsuario'])) echo 'Logado como: ' . $viewData['nomeUsuario']; ?>
			</span>
			<a href="/login/sair" class="btn btn-sm btn-outline-primary ml-2">Sair</a>
		</div>
	</nav>

	<section id="conteudo">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="display-4"><?php echo $viewData['titulo']; ?></h1>
				</div>
			</div>
			<hr>
			<?php $this->loadViewInTemplate($viewName, $viewData); ?>
		</div>
	</section>

	<footer>
		<p class="text-center">
			&#169; 2017 - MicroBlog! - Todos os direitos reservados.
		</p>
	</footer>

	<!-- Carrega os scripts e bibliotecas javascript -->
	<script type="text/javascript" src="<?php echo BASE_URL?>/public/vendor/jquery/dist/jquery.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL?>/public/vendor/popper.js/dist/umd/popper.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL?>/public/vendor/bootstrap/dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL?>/public/assets/js/main.js"></script>
</body>

</html>
