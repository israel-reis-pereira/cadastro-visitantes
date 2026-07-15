<?php
require_once "conectar.php";
$query = "SELECT nome, cod FROM livro ORDER BY data DESC";
$resultado = mysqli_query($conexao, $query);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <title>Procuras</title>
</head>
<body>
<center>
    <form method="post" action="exibe.php">
    <table border="1" bordercolor="blue">
        <tr>
            <td colspan="2">
            <center><b><font face="arial" size="4" color="blue">
            Alteração ou exclusão de registros
            </font></b></center>
            </td>
        </tr>
        <tr>
            <td width="150"><font face="arial">Selecione um nome:</font></td>
            <td>
                <select name="procura" size="1">
                    <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                        <option value="<?php echo (int) $linha["cod"]; ?>">
                        <?php echo htmlspecialchars($linha["nome"], ENT_QUOTES, "UTF-8");
                        ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><center><input type="reset" value="Limpar"></center></td>
            <td><center><input type="submit" value="Enviar"></center></td>
        </tr>
    </table>
    </form>
    <p><input type="button" value="Voltar" onclick="window.location.href='index.php';"> 
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
