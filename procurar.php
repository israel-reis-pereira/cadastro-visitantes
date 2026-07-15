<?php
require_once "conectar.php";
$query = "SELECT nome, cod FROM livro ORDER BY data DESC";
$resultado = mysqli_query($conexao, $query);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 <link rel="stylesheet" href="css/style.css">
 <title>Procurar</title>
</head>
<body>
<center>
    <form method="post" action="exibe.php">
        <table>
            <tr>
                <td colspan="2">
                <center><h1>Gerenciar Registros</h1></center>
                </td>
            </tr>
            <tr>
                <td width="150"><font face="arial">Selecione um nome:</font></td>
                <td>
                    <select name="procura" size="1">
                        <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                            <option value="<?php echo (int) $linha["cod"]; ?>">
                            <?php echo htmlspecialchars($linha["nome"], ENT_QUOTES, "UTF-8"); ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="reset" value="Limpar"></td> 
                <td><input type="submit" value="Enviar"></td>
            </tr>
        </table>
    </form>
    <p><button onclick="window.location.href='index.php';">Voltar</button></p>
    <?php 
        // Liberação dos recursos da memória do servidor
        mysqli_free_result($resultado); 

        // Encerramento seguro da conexão em escopo global estável
        if (isset($conexao) && $conexao) { 
            mysqli_close($conexao); 
        } 
    ?> 
</body>
</html>
