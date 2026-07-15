<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <title>Procuras</title>
</head>
<body>
<center>
   <form  method="post" action="resultados.php">
      <table border="1" bordercolor="blue">
      <tr>
         <td colspan="2">
         <center><b><font face="arial" size="4" color="blue">Consulta de registros</font></b></center>
         </td>
      </tr>
      <tr>
         <td  width="150"><font face="arial">Digite um nome:</font></td>
         <td><input type="text" name="nome" width="150"></td>
      </tr>
      <tr>
         <td><center><input type="reset" value="Limpar"></center></td>
         <td><center><input type="submit" value="Procurar"></center></td>
      </tr>
      </table>
   </form>
 <hr color="red">
   <form method="post" action="resultados2.php">
      <table border="1" bordercolor="blue">
      <tr>
         <td  colspan="2">
         <center><b><font face="arial" size="4" color="blue">Consulta com opções</font></b></center>
         </td>
      </tr>
      <tr>
         <td width="150"><font face="arial">Digite um nome:</font></td>
         <td><input type="text" name="nome" width="150"></td>
      </tr>
      <tr>
         <td><center><input type="reset" value="Limpar"></center></td>
         <td><center><input type="submit" value="Procurar"></center></td>
      </tr>
      </table>
 </form>
 <br><br><center><button onclick="window.history.back()">Voltar</button></center>
</center>
</body>
</html>