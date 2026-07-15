<?php
require_once "conectar.php";
$begin = isset($_GET["begin"]) ? max(0, (int) $_GET["begin"]) : 0; // impede de usar valor menor que 0
$limite = 20;
// Total de mensagens
$queryTotal = "SELECT COUNT(*) AS total FROM livro";
$resultadoTotal = mysqli_query($conexao, $queryTotal);
$linhaTotal = mysqli_fetch_assoc($resultadoTotal);
$total = (int) $linhaTotal["total"];
mysqli_free_result($resultadoTotal);
// Links de navegação
if (($begin > 0) && ($begin <= $limite)) { 
 $anteriores = '<a href="ler.php?begin=0">Anteriores</a>';
} elseif ($begin > $limite) {
 $anteriores = '<a href="ler.php?begin=' . ($begin - $limite) .
'">Anteriores</a>';
} else {
 $anteriores = 'Anteriores';
}
if (($begin + $limite) >= $total) {
 $proximas = 'Próximas';
} else {
 $proximas = '<a href="ler.php?begin=' . ($begin + $limite) . '">Próximas</a>';
}
$stmt = mysqli_prepare(
 $conexao,
 "SELECT cod, nome, localizacao, mensagem, data
 FROM livro
 ORDER BY data DESC
 LIMIT ?, ?"
);
mysqli_stmt_bind_param($stmt, "ii", $begin, $limite);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <title>Livro de Visitas: Ler</title>
</head>
<body bgcolor="white">
<h1>Livro de Visitas</h1>
<p>
 Total de mensagens postadas: <b><?php echo $total; ?></b>
 (<a href="assinar.php">Assine você também!</a>)<br>
 Exibindo <b><?php echo $limite; ?></b> mensagens por página,
 mostrando mensagens de <b><?php echo $begin + 1; ?></b>
 a <b><?php echo min($begin + $limite, $total); ?></b>.
</p>
<p><?php echo $anteriores . " | " . $proximas; ?></p>
<?php
while ($linha = mysqli_fetch_assoc($resultado)) {
 $dataFormatada = date("d/m/Y \à\s H:i:s", strtotime($linha["data"])); ?>
 <table border="0" width="70%">
 <tr><td bgcolor="navy" colspan="2"></td></tr>
 <tr>
    <td><b>Data:</b></td>
    <td width="100%"><?php echo $dataFormatada; ?></td>
 </tr>
 <tr>
    <td><b>Nome:</b></td>
    <td><?php echo htmlspecialchars($linha["nome"], ENT_QUOTES, "UTF-8"); ?></td>
 </tr>
 <tr>
    <td><b>Localização:</b></td>
    <td><?php echo htmlspecialchars($linha["localizacao"], ENT_QUOTES, "UTF-8"); ?></td>
 </tr>
 <tr>
    <td><b>Mensagem:</b></td>
    <td><?php echo nl2br(htmlspecialchars($linha["mensagem"], ENT_QUOTES, "UTF-8")); ?></td>
 </tr>
 </table>
 <br>
<?php
}
mysqli_stmt_close($stmt);
if (isset($conexao) && $conexao) {
        mysqli_close($conexao);
    }
?>
</body>
</html>
