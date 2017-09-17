<?php
/*
 * DESCRIÇÃO: Página de localizacao de usuarios do Modelo MVC - Curso B7WEB
 * DATA: 05/02/2017
 * @author Getulio Vinicius <getuliovinits@gmail.com>
 */
?>

<h1>CURSO B7WEB - Modelo MVC - USUÁRIOS - CADASTRO</h1>
<hr>

<?php
if (isset($naoEncontrado)) {
    echo $naoEncontrado;
} else {
    echo '<h2>' . $usuarioNome . '</h2>';
    echo '<p>' . $usuarioEmail . '</p>';
    echo '<pre><a href="' . BASE_URL . '/usuarios/editar/' . $usuarioId . '">Editar</a> - <a href="' . BASE_URL . '/usuarios/excluir/' . $usuarioId . '">Excluir</a></pre>';
}
?>

<hr>
<pre>
	<a href="<?php echo BASE_URL?>/usuarios"><<< Voltar</a>
</pre>
