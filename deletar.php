    <?php
    require_once "conectar.php";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cod = isset($_POST["cod"]) ? (int) $_POST["cod"] : 0; // verifica se é inteiro
    if ($cod > 0) {
    $stmt = mysqli_prepare($conexao, "DELETE FROM livro WHERE cod = ?");
    mysqli_stmt_bind_param($stmt, "i", $cod); /** espera para receber um valor inteiro */
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    if (isset($conexao) && $conexao) { 
            mysqli_close($conexao); 
        }
        header("Location: procurar.php"); 
        exit; 
    } else { 
        
        exibirMensagem("Selecione o registro antes de excluir!");
    } 
} else { 
    exibirMensagem("A página deve ser acessada a partir do formulário de exclusão", true);
} 

if (isset($conexao) && $conexao) { 
    mysqli_close($conexao); 
} 


function exibirMensagem($texto, $usarH1 = false) {
    echo '<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">';
    echo $usarH1 ? '<title>Acesso Negado</title></head><body>' : '<title>Aviso</title></head><body>';
    echo $usarH1 ? "<h1>$texto</h1>" : "<p>$texto</p>";
    echo '<br><p><button onclick="window.history.back()">Voltar</button></p>
    </body>
    </html>';
}
?>