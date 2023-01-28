<?php
    // Recebe o ID do usuário via POST
    $id = $_POST['id'];

    // Cria a conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', '', 'dbtestepratico');

    // Monta a query para buscar as informações do usuário
    $query = "SELECT Nome_Completo, CEP, Enderec, Numero, Complemento, Bairro, Cidade, Estado, Email_User, CPF_User, Tel_User, usuario, status_user, id, senha FROM usuarios WHERE id = $id";

    // Executa a query
    $result = $conn->query($query);

    // Verifica se houve resultado
    if ($result->num_rows > 0) {
        // Pega as informações do usuário
        $user = $result->fetch_assoc();

        // Monta a tabela com as informações do usuário
        echo "<table class='table'>";
        echo "<tr><th>CEP</th><td>".$user['$CEP']."</td></tr>";
        echo "<tr><th>Endereco</th><td>".$user['$Enderec']."</td></tr>";
        echo "<tr><th>Numero</th><td>".$user['$Numero']."</td></tr>";
        echo "<tr><th>Complemento</th><td>".$user['$Complemento']."</td></tr>";
        echo "<tr><th>Bairro</th><td>".$user['$Bairro']."</td></tr>";
        echo "<tr><th>Cidade</th><td>".$user['$Cidade']."</td></tr>";
        echo "<tr><th>Estado</th><td>".$user['$Estado']."</td></tr>";
        echo "<tr><th>Email_User</th><td>".$user['$Email_User']."</td></tr>";
        echo "<tr><th>CPF_User</th><td>".$user['$CPF_User']."</td></tr>";
        echo "<tr><th>Tel_User</th><td>".$user['$Tel_User']."</td></tr>";
        echo "<tr><th>usuario</th><td>".$user['$usuario']."</td></tr>";
        echo "<tr><th>status_user</th><td>".$user['$status_user']."</td></tr>";
        echo "<tr><th>id</th><td>".$user['$id']."</td></tr>";
        echo "<tr><th>senha</th><td>".$user['senha']."</td></tr>";
        echo "</table>";
    } else {
        echo "Nenhum usuário";
    }
