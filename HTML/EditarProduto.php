<?php
// Conexão com o banco de dados
$con = mysqli_connect("mysql7.serv00.com", "m10739_carreiraf", "123qwe!@#QWE", "m10739_carreiraemfoco");

// Verificação de erro na conexão
if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Inicialização das variáveis com valores vazios por padrão
$codx = '';  
$loginx = '';
$emailx = '';
$cpfx = '';
$telx = '';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados enviados via POST e faz a sanitização
    $codx = htmlspecialchars($_POST["cod"] ?? '');
    $loginx = htmlspecialchars($_POST["nome"] ?? '');
    $emailx = htmlspecialchars($_POST["email"] ?? '');
    $cpfx = htmlspecialchars($_POST["cpf"] ?? '');
    $telx = htmlspecialchars($_POST["tel"] ?? '');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Perfil</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../CSS/editarproduto_notebook.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body id="fd">
 
  
  <div class="container">
    
     <div class="jumbotron"></div>
  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          
         
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        
        <h1 id="meusdados">Editar dados</h1>
        
        <form class="form-horizontal" method="POST" action="DoCadastroEditado.php" enctype="multipart/form-data">
          <input type="hidden" name="cod" value="<?php echo $codx; ?>">
          
            <input type="file" class="form-control-file" style=" display: none;" name="imagens" id="arq" accept="image/*">
          
              
              
             <label for="arq">
    <i class="bi bi-image"></i> &nbsp;
    Editar foto
</label>
      
          
          <div class="form-group">
      <label class="control-label col-sm-2" for="nome" id="txtnome">Nome:</label>
      <div class="col-sm-10">
        <input type="text" style="background-color: #f4f4f4;" class="form-control" id="nome" name="nome" value="<?php echo $loginx; ?>" required>
      </div>
    </div>
         <div class="form-group">
      <label class="control-label col-sm-2" for="email" id="txtemail">E-mail:</label>
      <div class="col-sm-10">
        <input type="email" style="background-color: #f4f4f4;" class="form-control" id="email" name="email" value="<?php echo $emailx; ?>" required>
      </div>
    </div>
      
           <div class="form-group">
      <label class="control-label col-sm-2" for="cpf" id="txtcpf">CPF:</label>
      <div class="col-sm-10">
        <input type="text" style="background-color: #f4f4f4;" class="form-control" id="cpf" name="cpf" value="<?php echo $cpfx; ?>" required>
      </div>
    </div>
          
   <div class="form-group">
      <label class="control-label col-sm-2" for="tel" id="txttel">Telefone:</label>
      <div class="col-sm-10">
        <input type="text" style="background-color: #f4f4f4;" class="form-control" id="tel" name="tel" value="<?php echo $telx; ?>" required>
      </div>
    </div>
         
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" id="buttonat"><i class="bi bi-pencil-square"></i>&nbsp; Atualizar dados</button>
        <button type="button" class="btn btn-secondary" id="buttonlim">Limpar</button>

<script>
    document.getElementById("buttonlim").addEventListener("click", function() {
        document.getElementById("nome").value = "";
        document.getElementById("email").value = "";
        document.getElementById("cpf").value = "";
        document.getElementById("tel").value = "";
    });
</script>

      </div>
    </div>
        </form>
      </div>
    
  </div>
      <a href="../HTML/lista.php">
            <img src="../IMAGENS/voltar.png" id="voltar">
       </a>
</div>
   <p class="mb-1">&copy; 2024 Carreira em Foco</p>
 


</body>
</html>



