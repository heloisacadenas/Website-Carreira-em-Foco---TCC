<?php
  session_start();
  //Conectando
  //$con = mysqli_connect('mysql7.serv00.com","m10739_carreiraf","CEFTcc24", "m10739_carreiraemfoco');
  $con = mysqli_connect('mysql7.serv00.com','m10739_carreiraf','123qwe!@#QWE', 'm10739_carreiraemfoco');
  

$emailx = $_SESSION['email'];
    
  //Verificando a conexao
  if(!$con) 
  {
    die("Erro ao conectar com o DB");
  }

?>