<?php
    //Conexão com bd

    
    $con = mysqli_connect('mysql7.serv00.com', 'm10739_carreiraf', '123qwe!@#QWE', 'm10739_carreiraemfoco') or die('Erro ao conectar no banco de dados!');

if (!$con) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

// Coletando dados do formulário de login
$email = $_POST['email'];
$senha = $_POST['senha']; // Senha fornecida pelo usuário no login
  


// Usando prepared statements para evitar SQL Injection
$comando = $con->prepare("SELECT senha FROM tab WHERE email = ?");
$comando->bind_param("s", $email);
$comando->execute();
$result = $comando->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $senhaHash = $row['senha']; // Recupera a senha criptografada do banco de dados

    // Verificando a senha com password_verify
    if (password_verify($senha, $senhaHash)) {
        // Senha correta
        session_start();
        $_SESSION["email"] = $email; // Armazena o email na sessão
        header("Location: ../HTML/inicial.html"); // Redireciona para a página inicial após o login
    } else {
        // Senha incorreta
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
            Swal.fire({
                title: "Erro!",
                text: "Senha incorreta! Por favor, tente novamente.",
                icon: "error",
                confirmButtonText: "Ok"
            });
        </script>';
    }
} else {
    // Usuário não encontrado
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo '<script>
        Swal.fire({
            title: "Erro!",
            text: "Usuário não encontrado! Verifique os dados e tente novamente.",
            icon: "error",
            confirmButtonText: "Ok"
        });
    </script>';
}

// Fechando a conexão com o banco de dados
mysqli_close($con);
?>

