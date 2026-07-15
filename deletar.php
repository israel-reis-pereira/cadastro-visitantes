<?php
require_once "conectar.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
 $cod = isset($_POST["cod"]) ? (int) $_POST["cod"] : 0; // verifica se é inteiro
 if ($cod > 0) {
 $stmt = mysqli_prepare($conexao, "DELETE FROM livro WHERE cod = ?");
 mysqli_stmt_bind_param($stmt, "i", $cod); /** espera para receber um valor inteiro */
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);
 header("Location: procurar.php");
 exit;
 } else {
 echo 'Selecione o registro antes de excluir!<br><button onclick="window.history.back()">Voltar</button>';
 }
} else {
 echo '<h1>A página deve ser acessada a partir do formulário de exclusão.</h1><br><center>
 <button onclick="window.history.back()">Voltar</button></center>';
}
if (isset($conexao) && $conexao) {
    mysqli_close($conexao);
}
?>