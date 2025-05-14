<?php
session_start();
if (!isset($_SESSION["email"])) {
    echo "Erro: Sessão expirada ou usuário não logado.";
    exit;
}

$user_email = $_SESSION["email"];

include "../Conexao/conexao.php";

// Verificar a conexão
if (!$con) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Preparar a consulta SQL para evitar SQL Injection
$stmt = $con->prepare("SELECT * FROM tab WHERE email = ?");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$tab = $stmt->get_result();

if ($tab->num_rows === 0) {
    echo "Erro: Nenhum perfil encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Meu perfil</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../CSS/listanotebook.css" media="screen and (min-width:801px)">
  <link rel="stylesheet" href="../CSS/smartphone_lista.css" media="screen and (max-width:800px)">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body id="fd">
  <h2 id="txtmeup"><strong>MEU PERFIL</strong></h2>
  
  <div class="container">
    <div class="jumbotron">
       <a href="../HTML/inicial.html">
            <img src="../IMAGENS/voltar.png" id="voltar">
       </a>
    </div>
   
    <br>
    <table class="table table-striped">
      <tr>
        <th style="font-family: 'Poppins', sans-serif;">Nome:</th>
        <th style="font-family: 'Poppins', sans-serif;">E-mail:</th>
        <th style="font-family: 'Poppins', sans-serif;">CPF:</th>
        <th style="font-family: 'Poppins', sans-serif;">Telefone:</th>
        <th></th>
      </tr>
    
      <?php
        while($linha = $tab->fetch_assoc()) {
          echo "
              <tr>
                <td>".htmlspecialchars($linha['login'])."</td>
                <td>".htmlspecialchars($linha['email'])."</td>
                <td>".htmlspecialchars($linha['cpf'])."</td>
                <td>".htmlspecialchars($linha['tel'])."</td>
                <td>
                  <center>
                    <form action='EditarProduto.php' method='POST'>       
                      <input type='hidden' name='cod' value='" . htmlspecialchars($linha['cod']) . "'>
                      <input type='hidden' name='nome' value='" . htmlspecialchars($linha['login']) . "'>
                      <input type='hidden' name='email' value='" . htmlspecialchars($linha['email']) . "'>
                      <input type='hidden' name='cpf' value='" . htmlspecialchars($linha['cpf']) . "'>
                      <input type='hidden' name='tel' value='" . htmlspecialchars($linha['tel']) . "'>
                      <input type='hidden' name='imagens' value='" . htmlspecialchars($linha['imagens']) . "'>
                      <button type='submit' class='btn btn-default' id='editar'>Editar</button>
                    </form>
                <hr>
<form id='formExcluirConta' action='excluir_conta.php' method='POST'>
    <input type='hidden' name='email' value='<?php echo htmlspecialchars($user_email); ?>'>
    <button type='submit' id='excluir' class='btn btn-danger'>Excluir</button>
</form>

<script>
    // Adicionando a confirmação de exclusão usando SweetAlert2
    document.getElementById('formExcluirConta').onsubmit = function (event) {
        event.preventDefault(); // Impede o envio do formulário

        // Exibe a SweetAlert2 para confirmação
        Swal.fire({
            title: 'Você tem certeza?',
            text: 'Esta ação é irreversível!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Se o usuário confirmar, envia o formulário
                document.getElementById('formExcluirConta').submit();
            }
        });
    };
</script>

            
            
                  </center>
                </td>
              </tr>";
        }
      ?>
    </table><br>

    <?php
      // Exibe a imagem associada ao usuário, se disponível
      mysqli_data_seek($tab, 0); // Retorna o ponteiro para o início da tabela
      while ($linha = $tab->fetch_assoc()) {
          if (!empty($linha['imagens'])) {
              echo "<img class='imagem' src='" . htmlspecialchars($linha['imagens']) . "'>";
          } else {
              echo "<p>Sem imagem de perfil.</p>";
          }
      }
    ?>

    <?php
      if (isset($_GET['atualizado'])) {
          echo "<div class='alert alert-success'>Dados atualizados com sucesso!</div>";
      }
    ?>
  </div>
</body>
</html>

<?php
// Fechar a conexão com o banco de dados
$stmt->close();
$con->close();
?>
