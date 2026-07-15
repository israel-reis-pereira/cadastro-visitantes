<?php

function carregarCredenciais($caminho) {
    if (!file_exists($caminho)) { // verifica se o arquivo existe no caminho
        return false;
    }

    $linhas = file($caminho, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($linhas as $linha) {
        if (strpos(trim($linha), '#') === 0) { // ignora linhas que comecam com #
            continue;
        }

        if (strpos($linha, '=') !== false) {
            list($chave, $valor) = explode('=', $linha, 2); // quebra cada linha apos o =, assim separa nome da config do valor real
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
    die("Impossível conectar: " . mysqli_connect_error()); // intercepta quando há falha no banco em uma mensagem
}

if (!mysqli_select_db($conexao, $banco)) { // aponta para o schema especifico do banco
    die("Impossível selecionar essa base de dados");
}
	
mysqli_set_charset($conexao, "utf8mb4"); // garante funcionar acentuacao
 // echo '<button onclick="window.history.back()">Voltar</button><p>'
?>
