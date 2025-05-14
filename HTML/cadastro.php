<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!--<link rel="stylesheet" type="text/css" href="../CSS/cadastro.css" media="screen and (min-width:641px)">-->
  <link rel="stylesheet" href="../CSS/notebook_cadastro.css" media="screen and (min-width:801px)">
    <link rel="stylesheet" type="text/css" href="../CSS/smartphone_cadastro.css" media="screen and (max-width:800px)">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src='main.js'></script>
</head>
 
<body id="fd">

    <div id="painel">
        <a href="index.html">
            <img id="img1" src="../IMAGENS/logo.png" alt="imagem">
        </a>

        <h3 style="font-weight: normal;" id="cabec">POR FAVOR, INSIRA SEUS DADOS.</h3>

        <form role="form" class="smallwidth" action="inserir.php" method="POST" enctype="multipart/form-data">
            <div id="txt">
                <h1 id="txtcadastro">CADASTRE-SE</h1>
                <h4 id="cabec2">NOME:</h4>
                <input type="text" placeholder="Nome" id="txtnome" name="nome" required><br>
                <h4 id="cabec5">E-MAIL:</h4>
                <input type="email" placeholder="E-mail" id="txtemail" name="email" required><br>
                <h4 id="cabec6">SENHA:</h4>
                <input type="password" placeholder="Senha" id="txtsenha" name="senha" required s><br>
              <i class="bi bi-eye-slash" style=" position: absolute; left: 80%; top: 49.8%; cursor: pointer; color: #71797E;" id='olhofechado'></i>
              
                <h4 id="cabec7">NÚMERO:</h4>
                <input type="text" placeholder="Número" id="txtnumero" name="tel" required><br>
                <h4 id="cabec8">CPF:</h4>
                <input type="text" placeholder="CPF" id="txtcpf" name="cpf"><br>

              
              
          <input type="file" name="imagens" id="arq" style=" display: none;">
              
              
             <label for="arq">
    <i class="bi bi-image"></i> &nbsp;
    Escolha uma foto
</label>

              
              
                

               <input style="background-color: #5100FF; left: 7px; border: none; color: white; padding: 10px 20px; cursor: pointer;"
         class="button" type="submit" value="CRIAR CONTA" id="botao-alerta">

  <script>
    // Adiciona evento de clique ao botão para exibir o alerta
    document.getElementById("botao-alerta").addEventListener("click", function(event) {
      Swal.fire({
  title: "Cadastro realizado com sucesso!",
  icon: "success"
});
 
    });
  </script>
          
            </div>
        </form>
      
      <!--
      <form action="uploadx.php" method="post" enctype="multipart/form-data">
  ESCOLHA A IMAGEM:
  <input type="file" name="imagens" id="arq">
  <input type="submit" value="ENVIAR IMAGEM" name="submit">
</form>
-->

        <a href="login.html" id="cabec9">JÁ TENHO UMA CONTA.</a>

        <a href="index.html">
            <img src="../IMAGENS/voltar.png" id="voltar">
        </a>
    </div>

    <div id="painel2">
        <h2 id="cabec4">DESCUBRA A <strong>PROFISSÃO</strong> QUE<br>‎‎  ‎ ‎ MAIS COMBINA COM VOCÊ!</h2>
        <img id="img3" src="../IMAGENS/desenho4.PNG" alt="imagem">
    </div>
  
   
  <script>
  let olhofechado = document.getElementById("olhofechado");
  let txtsenha = document.getElementById("txtsenha");

  olhofechado.onclick = function() {
    if (txtsenha.type == "password") {
      txtsenha.type = "text";
      olhofechado.classList.remove("bi-eye-slash");
      olhofechado.classList.add("bi-eye");
    } else {
      txtsenha.type = "password";
      olhofechado.classList.remove("bi-eye");
      olhofechado.classList.add("bi-eye-slash");
    }
  }
</script>

</body>
</html>

