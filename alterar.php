<?php
require_once "conectar.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
 $nome = trim($_POST["nome"] ?? "");    // e pq o xampp ta rodando uma versao antiga do php logo o ?? é utilizado em versoes mais recentes
 $localizacao = trim($_POST["localizacao"] ?? "");
 $mensagem = trim($_POST["mensagem"] ?? "");
 $data = trim($_POST["data"] ?? "");
 $cod = isset($_POST["cod"]) ? (int) $_POST["cod"] : 0;
    if ($nome !== "" && $localizacao !== "" && $mensagem !== "" && $data !== "" && $cod > 0) {
    $stmt = mysqli_prepare(
    $conexao,
    "UPDATE livro
    SET nome = ?, localizacao = ?, mensagem = ?, data = ?
    WHERE cod = ?"
    );
    mysqli_stmt_bind_param($stmt, "ssssi", $nome, $localizacao, $mensagem, $data, $cod);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: procurar.php");
    exit;
    } else {
    echo 'Preencha todos os campos!<br>
    <button onclick="window.history.back()">Voltar</button>';
    }
} else {
 echo '<h1>A página deve ser acessada a partir do formulário de alteração.</h1><br>
 <center><button onclick="window.history.back()">Voltar</button>';
}
if (isset($conexao) && $conexao) {
    mysqli_close($conexao);
}
?>
