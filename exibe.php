<?php
require_once "conectar.php";
$err = "";
$linha = null;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cod = isset($_POST["procura"]) ? (int) $_POST["procura"] : 0;  //protecao contra SQL Injection 
    //protecao contra SQL Injection
    $stmt = mysqli_prepare($conexao, "SELECT * FROM livro WHERE cod = ?");
    mysqli_stmt_bind_param($stmt, "i", $cod);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);
    $linha = mysqli_fetch_assoc($resultado);
        if (!$linha) {
        $err = "Registro não encontrado.";
        }
        mysqli_stmt_close($stmt);
        } else {
        $err = "Selecione um registro antes de continuar.";
    }
    //fecha a conexao global
    if (isset($conexao) && $conexao) {
    mysqli_close($conexao);
}
$dataFormatada = "";
if ($linha && isset($linha["data"])) {
    $dataFormatada = date("d/m/Y H:i:s", strtotime($linha["data"])); 
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="css/style.css">
 <title>Livro de Visitas: Alterar</title>
</head>
<body>
<h1>Alterações no Livro de Visitas</h1>
<?php if ($err !== "") { ?>
 <p style="color:red;"><?php echo htmlspecialchars($err, ENT_QUOTES, "UTF-8"); ?></p>
<?php } ?>

<?php if ($linha) { ?>
<form method="post" action="alterar.php">
    <table>
    <tr>
        <td>Nome:</td>
        <td><input type="text"  name="nome"
        value="<?php echo htmlspecialchars($linha["nome"], ENT_QUOTES, "UTF-8"); ?>"
        maxlength="250"></td>
    </tr>
    <tr>
        <td>Localização:</td>
        <td><input type="text" name="localizacao"
        value="<?php echo htmlspecialchars($linha["localizacao"], ENT_QUOTES, "UTF-8"); ?>"
        maxlength="45"></td>
    </tr>
    <tr>
        <td>Data:</td>
        <td><input type="text" size="20" name="data" value="<?php echo $dataFormatada; ?>" 
        readonly  maxlength="19"></td>
    </tr>
    <tr>
        <td colspan="2">
        <textarea  rows="10" name="mensagem"><?php
        echo htmlspecialchars($linha["mensagem"], ENT_QUOTES, "UTF-8"); ?></textarea>
        </td>
    </tr>
    </table>
    <input type="hidden" name="cod" value="<?php echo (int) $linha["cod"]; ?>">
    <p><input type="reset" value="Recarregar"></p>
    <p><input type="submit" value="Alterar"></p>
</form>
<form method="post" action="deletar.php"> 
    <input type="hidden" name="cod" value="<?php echo (int) $linha["cod"]; ?>"> 
    <p><input type="submit" value="Apagar"></p>
    <p><input type="button" value="Voltar" onclick="window.location.href='index.php';"></p> 
</form> 
<?php } ?>
</body>
</html>
