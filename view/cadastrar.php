<?php

if(isset($_POST['submit']))
{
    // print_r('Nome: ' . $_POST['nome']);
    // print_r('<br>');
    // print_r('Email: ' . $_POST['email']);
    // print_r('<br>');
    // print_r('Telefone: ' . $_POST['telefone']);
    // print_r('<br>');
    // print_r('Sexo: ' . $_POST['genero']);
    // print_r('<br>');
    // print_r('Data de nascimento: ' . $_POST['data_nascimento']);
    // print_r('<br>');
    // print_r('Cidade: ' . $_POST['cidade']);
    // print_r('<br>');
    // print_r('Estado: ' . $_POST['estado']);
    // print_r('<br>');
    // print_r('Endereço: ' . $_POST['endereco']);

    include_once('../controller/conn.php');

    $nome = $_POST['nomeCompleto'];
    $email = $_POST['emailCads'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $compl = $_POST['complemento'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $usuario = $_POST['usuario'];
    $status = $_POST['status'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];

    $result = mysqli_query($conn, "INSERT INTO users(Nome_Completo, usuario, senha, Email_User, Tel_User, CPF_User, CEP, Cidade, Estado Enderec, Numero, Complemento, Bairro, status_user 
    ) 
    VALUES ('$nome', $usuario, '$senha','$email','$telefone','$cpf','$cep','$cidade','$estado','$endereco', '$numero', '$compl', '$bairro', '$status'");

    header('Location: modulos.php');
}

?>