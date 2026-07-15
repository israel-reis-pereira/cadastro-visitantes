<?php
require_once "conectar.php";
$err = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
 $nome = trim($_POST["nome"] ?? "");    // e pq o xampp ta rodando uma versao antiga do php logo o ?? é utilizado em versoes mais recentes
 $localizacao = trim($_POST["localizacao"] ?? "");
 $mensagem = trim($_POST["mensagem"] ?? "");
 if ($nome !== "" && $localizacao !== "" && $mensagem !== "") {
 $stmt = mysqli_prepare(
 $conexao,
 "INSERT INTO livro (nome, localizacao, mensagem, data) VALUES (?, ?, ?,
NOW())"
 );
 mysqli_stmt_bind_param($stmt, "sss", $nome, $localizacao, $mensagem);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);
 header("Location: mostrar.php");
 exit;
 } else {
 $err = "Preencha todos os campos!";
 }
 if (isset($conexao) && $conexao) {
    mysqli_close($conexao);
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <title>Livro de Visitas: Assinar</title>
</head>
<body bgcolor="white">
<h1>Assine o Livro de Visitas</h1>
<?php if ($err !== "") { ?>
 <p style="color:red;"><?php echo htmlspecialchars($err, ENT_QUOTES, "UTF-8"); ?></p>
<?php } ?>
<form method="post" action="assinar.php">
    <table border="0">
    <tr>
        <td>Nome:</td>
        <td><input type="text" size="15" name="nome" maxlength="250" 
        value="<?php echo htmlspecialchars($_POST["nome"] ?? "",ENT_QUOTES, "UTF-8"); ?>"></td>
    </tr>
    <tr>
        <td>Localização:</td>
        <td>
        <input type="text" size="15" name="localizacao" maxlength="45" 
        value="<?php echo htmlspecialchars($_POST["localizacao"] ?? "", ENT_QUOTES, "UTF-8"); ?>">
        </td>
    </tr>
    <tr>
        <td colspan="2">
        <textarea cols="60" rows="10" name="mensagem" placeholder="Digite aqui sua mensagem!">
            <?php echo htmlspecialchars($_POST["mensagem"] ?? "", ENT_QUOTES, "UTF-8");?></textarea>
        </td>
    </tr>
    </table>
 <input type="submit" value="Assinar">
 <input type="button" value="Voltar" onclick="window.location.href='index.php';"> 
 <!--<button onclick="window.history.back()">Voltar</button>-->
</form>
</body>
</html>