<?php
require_once "conectar.php";
$begin = isset($_GET["begin"]) ? max(0, (int) $_GET["begin"]) : 0; // impede de usar valor menor que 0
$limite = 5;

// Total de mensagens
$queryTotal = "SELECT COUNT(*) AS total FROM livro";
$resultadoTotal = mysqli_query($conexao, $queryTotal);
$linhaTotal = mysqli_fetch_assoc($resultadoTotal);
$total = (int) $linhaTotal["total"];
mysqli_free_result($resultadoTotal);

// Links de navegação
if (($begin > 0) && ($begin <= $limite)) { 
    $anteriores = '<button onclick="window.location.href=\'ler.php?begin=0\';">Anteriores</button>';
} elseif ($begin > $limite) {
    $anteriores = '<button onclick="window.location.href=\'ler.php?begin=' . ($begin - $limite) . '\';">Anteriores</button>';
} else {
    $anteriores = '<button disabled>Anteriores</button>';
}

if (($begin + $limite) >= $total) {
    $proximas = '<button disabled>Próximas</button>';
} else {
    $proximas = '<button onclick="window.location.href=\'ler.php?begin=' . ($begin + $limite) . '\';">Próximas</button>';
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
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 <link rel="stylesheet" href="css/style.css">
 <title>Livro de Visitas: Ler</title>
</head>
<body>
<h1>Livro de Visitas</h1>
<p >
 Total de mensagens postadas: <b><?php echo $total; ?></b><br>
 Exibindo <b><?php echo $limite; ?></b> mensagens por página,
 mostrando mensagens de <b><?php echo $begin + 1; ?></b>
 a <b><?php echo min($begin + $limite, $total); ?></b>.
<!-- <button onclick="window.location.href='assine.php';">Assine você também!</button> -->
</p>
<div class="container-botoes">
    <?php echo $anteriores; ?>
    <?php echo $proximas; ?>
    
    <!-- Botão Assine -->
    <button onclick="window.location.href='assinar.php';">Assine você também!</button>
</div>
<?php
while ($linha = mysqli_fetch_assoc($resultado)) {
 $dataFormatada = date("d/m/Y \à\s H:i:s", strtotime($linha["data"])); ?>
 <table>
   <tr>
      <td><b>Nome:</b></td>
      <td><?php echo htmlspecialchars($linha["nome"], ENT_QUOTES, "UTF-8"); ?></td>
   </tr>
   <tr>
      <td><b>Data:</b></td>
      <td><?php echo $dataFormatada; ?></td>
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
<p><button onclick="window.location.href='index.php';">Voltar</button></p>
</body>
</html>
