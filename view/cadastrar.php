<?php
    $conn = new mysqli("localhost", "root", "", "dbtestepratico");

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $nome = mysqli_real_escape_string($conn, $_POST['nomeCompletoCad']);
    $email = mysqli_real_escape_string($conn, $_POST['emailCads']);
    $senha = mysqli_real_escape_string($conn, $_POST['senhaCad']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $compl = mysqli_real_escape_string($conn, $_POST['complemento']);
    $numero = mysqli_real_escape_string($conn, $_POST['numero']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conn, $_POST['estadocad']);
    $bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
    $rua = mysqli_real_escape_string($conn, $_POST['enderecCad']);
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $cpf =mysqli_real_escape_string($conn, $_POST['cpfCad']);
    $cep = mysqli_real_escape_string($conn, $_POST['cep']);
    $id = 0;

        $query_usuario= "INSERT * INTO users (
            `Nome_Completo`,
             `Email_User`, 
             `CPF_User`, 
             `senha`,
             `CEP`,
              `Enderec`,
              ` Numero`,
                `Complemento`,
                `Bairro`,
                `Cidade`,
                 `Estado`,
                 `Tel_User`,
                  `usuario`, 
                  `status_user`,
                  'id'
             ) VALUES ('$nome', '$usuario', '$senha','$email','$telefone','$cpf','$cep','$cidade','$estado','$rua', '$numero', '$compl', '$bairro', '$status', '$id' )";

          $cad_usuario = $conn->prepare($query_usuario);
          $cad_usuario->bindParam(':nome', $dados['nomeCompletoCad']);
          $cad_usuario->bindParam(':email', $dados['emailCads']);
          $cad_usuario->bindParam(':cpf', $dados['cpfCad']);
          $senha_cript = password_hash($dados['senhaCad'], PASSWORD_DEFAULT);
          $cad_usuario->bindParam(':senha', $senha_cript);

          $cad_usuario->execute();

          if($cad_usuario->rowCount()){
            $retorna = ['erro' => false, 'msg' =>"<div class='alert alert-success' role='alert'>Cadastrado com sucesso</div>" ];

          }else{
            $retorna = ['erro' => true, 'msg' =>"<div class='alert alert-danger' role='alert'>Cadastrado com sucesso</div>" ];

          }



    echo json_encode($retorna);











    /*$nome = $_POST['nomeCompleto'];
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
    $cpf = $_POST['cpfCad'];
    $cep = $_POST['cep'];

    $result = mysqli_query($conn, "INSERT INTO users(Nome_Completo, usuario, senha, Email_User, Tel_User, CPF_User, CEP, Cidade, Estado Enderec, Numero, Complemento, Bairro, status_user 
    ) 
    VALUES ('$nome', $usuario, '$senha','$email','$telefone','$cpf','$cep','$cidade','$estado','$endereco', '$numero', '$compl', '$bairro', '$status'");

    header('Location: modulos.php');
*/
?>