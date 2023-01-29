<?php

// Inicia a sessão
session_start();

// Se o formulário foi submetido
if (isset($_POST['submit'])) {

    // Conecta ao banco de dados
    $link = mysqli_connect("localhost", "root", "", "dbtestepratico");

    // Escapa as entradas do usuário para evitar ataques de SQL injection
    $username = mysqli_real_escape_string($link, $_POST['usuario']);
    $password = mysqli_real_escape_string($link, $_POST['senha']);

    // Monta a consulta para verificar se as credenciais do usuário existem no banco de dados
    $query = "SELECT * FROM users WHERE usuario = '$username' AND senha = '$password'";

    // Executa a consulta
    $result = mysqli_query($link, $query);

    // Se a consulta retornar um resultado válido
    if (mysqli_num_rows($result) == 1) {

        // Armazena o nome de usuário e o ID do usuário na sessão
        $row = mysqli_fetch_array($result);
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['user_id'] = $row['id'];

        // Redireciona o usuário para a página protegida
        header("Location: modulos.php");
    } else {
        // Exibe uma mensagem de erro se as credenciais do usuário não forem válidas
        echo'<script>alert("Usuario ou Senha Incorretos ")</script>';
      
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($link);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N Soluções</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="../libs/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../model/login.css">
    <script src="../controller/validacao.js"></script>
    
    <main class="form-signin w-100 m-auto">
<!-- Exibe o formulário de login -->
<form method="post" action="login.php" class="form-signin">
    <label for="username">Nome de usuário:</label>
    <input type="text" name="usuario" id="usuario">
    <br>
    <label for="password">Senha:</label>
    <br>
    <input type="password" name="senha" id="senha">

    <br>
    <input type="submit" name="submit" value="Login">
</form>
</main>

