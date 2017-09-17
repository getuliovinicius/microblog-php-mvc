<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>/assets/css/main.css" media="screen">
</head>

<body>
    <div class="container">
		<div class="row">
			<div class="col-xs-12">
                <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            </div>
        </div>
    </div>
	<!-- Carrega os scripts e bibliotecas javascript -->
	<script type="text/javascript" src="<?php echo BASE_URL?>/assets/js/jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL?>/assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL?>/assets/js/main.js"></script>

</body>

</html>
