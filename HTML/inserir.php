<?php

$con=mysqli_connect("mysql7.serv00.com","m10739_carreiraf","123qwe!@#QWE", "m10739_carreiraemfoco");
  
$loginx = $_POST["nome"];
$senhax = $_POST["senha"];
$emailx = $_POST["email"];
$cpfx = $_POST["cpf"];
$telx = $_POST["tel"];
$arq_temp = $_FILES['imagens']['tmp_name']; //Imagem
$arq_nome = $_FILES['imagens']['name']; //Nome da Imagem

//Caminho da pasta das imagens
$caminho = '../uploads/'.$arq_nome;

//Fazendo o upload da imagem na pasta de destino
@move_uploaded_file($arq_temp,$caminho);

// Gerar o hash da senha antes de inseri-la no banco de dados
$senhaHash = password_hash($senhax, PASSWORD_DEFAULT);

// Inserir os dados, agora com a senha criptografada
$comando = "INSERT INTO tab(login, senha, email, cpf, tel,imagens) VALUES ('$loginx','$senhaHash','$emailx','$cpfx','$telx','$caminho')";
$resulta = mysqli_query($con, $comando);

if ($resulta) {
    $dados = array("status" => "ok");
  
  session_start();
header("Location: login.html");

} else {
    $dados = array("status" => "erro");
}

$close = mysqli_close($con);
echo json_encode($dados);

?>

