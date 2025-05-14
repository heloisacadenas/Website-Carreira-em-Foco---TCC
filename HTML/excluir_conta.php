<?php
session_start();
include "../Conexao/conexao.php";

// Verificar se o usuário está logado
if (!isset($_SESSION['email'])) {
    echo "Erro: Sessão expirada ou usuário não logado.";
    exit;
}

$user_email = $_SESSION['email'];

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prepara a consulta SQL para excluir o usuário
    $stmt = $con->prepare("DELETE FROM tab WHERE email = ?");
    $stmt->bind_param("s", $user_email);

    // Executa a consulta e verifica o resultado
    if ($stmt->execute()) {
        // Destruir a sessão e redirecionar o usuário após a exclusão
        session_unset();
        session_destroy();
        header("Location: index.html?conta_excluida=1");
        exit;
    } else {
        echo "Erro ao excluir conta: " . $stmt->error;
    }

    // Fecha a consulta e a conexão
    $stmt->close();
    $con->close();
} else {
    echo "Ação inválida.";
    exit;
}
?>
