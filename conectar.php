<?php

function carregarCredenciais($caminho) {
    if (!file_exists($caminho)) {
        return false;
    }

    $linhas = file($caminho, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($linhas as $linha) {
        if (strpos(trim($linha), '#') === 0) {
            continue;
        }

        if (strpos($linha, '=') !== false) {
            list($chave, $valor) = explode('=', $linha, 2);
            $_ENV[trim($chave)] = trim($valor);
        }
    }
}

carregarCredenciais(__DIR__ . '/config/credenciais.ini');

$host    = $_ENV['DB_HOST'] ?? "localhost";
$usuario = $_ENV['DB_USER'] ?? "root";
$senha   = $_ENV['DB_PASS'] ?? "";
$banco   = $_ENV['DB_NAME'] ?? "aula2026";

$conexao = mysqli_connect($host, $usuario, $senha);

if (!$conexao) {
    die("Impossível conectar: " . mysqli_connect_error());
}

if (!mysqli_select_db($conexao, $banco)) {
    die("Impossível selecionar essa base de dados");
}
	
mysqli_set_charset($conexao, "utf8mb4");
 // echo '<button onclick="window.history.back()">Voltar</button><p>'
?>
