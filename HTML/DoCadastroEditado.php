<?php
session_start();

// Conectar ao banco de dados
$con = mysqli_connect("mysql7.serv00.com", "m10739_carreiraf", "123qwe!@#QWE", "m10739_carreiraemfoco");

// Verificar se a conexão foi bem-sucedida
if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Verificar se o usuário está logado
if (!isset($_SESSION["email"])) {
    echo "Erro: Sessão expirada ou usuário não logado.";
    exit;
}

  
$user_id = $_SESSION["email"];

// Capturar e validar os dados enviados via POST
  
$codx = htmlspecialchars($_POST["cod"] ?? '');
$loginx = htmlspecialchars($_POST["nome"] ?? '');
$emailx = htmlspecialchars($_POST["email"] ?? '');
$cpfx = htmlspecialchars($_POST["cpf"] ?? '');
$telx = htmlspecialchars($_POST["tel"] ?? '');
$arq_temp = $_FILES['imagens']['tmp_name']; //Imagem
$arq_nome = $_FILES['imagens']['name']; //Nome da Imagem

 

if (empty($loginx) || empty($emailx) || empty($cpfx) || empty($telx)) {
    echo "Erro: Todos os campos devem ser preenchidos.";
    exit;
}


  
//Caminho da pasta das imagens
$caminho = '../uploads/'.$arq_nome;

//Fazendo o upload da imagem na pasta de destino
@move_uploaded_file($arq_temp,$caminho);

  
  
  
  
  
  
  // Inicializar a variável de imagem
//$imagem = null;


 /* 
  // Verificar se o arquivo foi enviado e validar o upload
if (isset($_FILES['imagens']) && $_FILES['imagens']['error'] === UPLOAD_ERR_OK) {
    $fileType = mime_content_type($_FILES['imagens']['tmp_name']);
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    if (!in_array($fileType, $allowedTypes)) {
        echo "Erro: Tipo de arquivo inválido. Envie uma imagem (JPG, PNG, GIF).";
        exit;
    }

    if ($_FILES['imagens']['size'] > 2 * 1024 * 1024) {
        echo "Erro: O arquivo é muito grande. Máximo de 2MB.";
        exit;
    }

    $imagem = 'uploads/' . basename($_FILES['imagens']['name']);
    if (!move_uploaded_file($_FILES['imagens']['tmp_name'], $imagem)) {
        echo "Erro ao mover o arquivo para a pasta de uploads.";
        exit;
    }

    chmod($imagem, 0644);
}
  */
 
  
  /*
 echo $codx; 
   echo $loginx;
  echo  $emailx;
  echo  $cpfx;
  echo  $telx;
  echo  $user_id;
  echo  $arq_nome;
  
*/ 


  

// Preparar a consulta SQL para atualização
if ($arq_nome) {
    $stmt = $con->prepare("UPDATE tab SET login = ?, email = ?, cpf = ?, tel = ?, imagens = ? WHERE cod = ?");
    $stmt->bind_param("ssssss", $loginx, $emailx, $cpfx, $telx, $caminho, $codx);
} else {
    $stmt = $con->prepare("UPDATE tab SET login = ?, email = ?, cpf = ?, tel = ? WHERE cod = ?");
    $stmt->bind_param("sssss", $loginx, $emailx, $cpfx, $telx, $codx);
}

// Executar a consulta
if ($stmt->execute()) {
  
     $_SESSION["email"] = $emailx;
     header("Location: lista.php?atualizado=1");
     exit;
} else {
     error_log("Erro ao atualizar: " . $stmt->error);
     echo "Erro ao atualizar. Por favor, tente novamente mais tarde.";
}

// Fechar a conexão
$stmt->close();
$con->close();
?>
