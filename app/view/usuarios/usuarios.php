<?php
/*
 * DESCRIÇÃO: Página de usuarios do Modelo MVC - Curso B7WEB
 * DATA: 05/02/2017
 * @author Getulio Vinicius <getuliovinits@gmail.com>
 */
?>

<h1>CURSO B7WEB - Modelo MVC - USUÁRIOS</h1>
<hr>
<pre>
	<a href="<?php echo BASE_URL?>/usuarios/cadastrar">Cadastrar novo usuário</a>

	<a href="<?php echo BASE_URL?>/usuarios/localizar">Localizar usuário</a>
</pre>
<hr>

<?php
if (isset($naoEncontrado)) {
    echo $naoEncontrado;
} else {
    // Exibe a quantidade de usuarios registrados
    echo '<p>Quantidade de usuarios: ' . $quantidadeRegistros . '</p>';
    echo '<hr>';
    // Exibe a listagem dos registros
    foreach ($usuarios as $usuario) {
        echo '<p><strong>' . $usuario['usuarioNome'] . '</strong><p>';
        echo '<p>' . $usuario['usuarioEmail'] . '</p>';
        echo '<pre><a href="' . BASE_URL . '/usuarios/editar/' . $usuario['usuarioId'] . '">Editar</a> - <a href="/usuarios/excluir/' . $usuario['usuarioId'] . '">Excluir</a></pre>';
        echo '<hr>';
    }
}
?>

<pre>
	<a href="<?php echo BASE_URL?>"><<< Voltar</a>
</pre>
