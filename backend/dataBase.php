<?php
   $servidor = "localhost";
   $usuario = "root";
   $senha = "root";
   $nomeBanco = "bd_ajax_php_crud";

   $conexao = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);
   if (!$conexao) {
       # code...
       die("Falha na Conexão: ".mysqli_connect_error());
   }else {
    //    echo "Conexão ao banco de dados com sucesso!";
   }
?>