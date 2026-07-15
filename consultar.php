<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 <link rel="stylesheet" href="css/style.css"> 
 <title>Consultar</title>
</head>
<body>
<center>
   <form  method="post" action="resultados.php"><h1>Consultas no Livro de Visitas</h1>
      <table>
         <tr>
            <td colspan="2"> <center><b>Consulta de registros</b></center> </td>
         </tr>
         <tr>
            <td  width="150">Digite um nome:</td>
            <td><input type="text" name="nome" ></td>
         </tr>
         <tr>
            <td><center><input type="reset" value="Limpar"></center></td>
            <td><center><input type="submit" value="Procurar"></center></td>
         </tr>
      </table>
   </form><p><hr></p>
   <form method="post" action="resultados2.php"><!-- resultado com opcoes -->
      <table>
         <tr>
            <td colspan="2"><center><b>Consulta com opções</b></center></td>
         </tr>
         <tr>
            <td width="150">Digite um nome:</td>
            <td><input type="text" name="nome" ></td>
         </tr>
         <tr>
            <td><center><input type="reset" value="Limpar"></center></td>
            <td><center><input type="submit" value="Procurar"></center></td>
         </tr>
      </table>
 </form>
 <p><button onclick="window.history.back()">Voltar</button></p> 
</center>
</body>
</html>