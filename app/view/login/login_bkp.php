<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
</head>
<body>
    <h1><?php echo $titulo; ?></h1>
    <hr>
    <form class="" action="" method="post">
        <input type="email" name="emailUsuario"><br><br>
        <input type="password" name="senhaUsuario"><br><br>
        <input type="submit" name="entrar" value="Entrar"> - <a href="usuarios/cadastrar">Cadastre-se</a>
    </form>
</body>
</html>
