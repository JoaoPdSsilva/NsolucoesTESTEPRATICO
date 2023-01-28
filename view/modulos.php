<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulos</title>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../libs/fontAwesome/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="../controller/validacao.js"></script>
    <script src="../libs/bootstrap.min.js"></script>

</head>
<body>

<h2 class='mb-3'>Lista de Usuarios</h2>
<br>

<div class="col-5"><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalCadastro">Cadastrar</button></div>
<br>
<table id="table" class="table" width="100%">
    
  <thead>
    <tr>
    <th class="th-sm">Nome Completo</th>
    <th class="th-sm">Usuário</th>
    <th class="th-sm">Email</th>
    <th class="th-sm">Telefone</th>
    <th class="th-sm">Status</th>
    <th class="th-sm">Ações</th> 
    </tr>
                              
        </thead>
        <tbody>
  </thead>
  <tbody>
  <?php
                // Conexão com o banco de dados
                $conn = new mysqli('localhost', 'root', '', 'dbtestepratico');

                $query = "SELECT id, Nome_Completo, usuario, Email_User, Tel_User, status_user FROM users";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['Nome_Completo'] . '</td>';
                    echo '<td>' . $row['usuario'] . '</td>';
                    echo '<td>' . $row['Email_User'] . '</td>';
                    echo '<td>' . $row['Tel_User'] . '</td>';
                    echo '<td>' . $row['status_user'] . '</td>';
                    echo '<td>';
                    echo '<a href="#" data-toggle="modal" data-target="#modalEdit" class="edit" data-id="' . $row['id'] . '"><i class="fa fa-edit"></i></a>';
                    echo '<a href="#" data-toggle="modal" data-target="#modalView" class="view" data-id="' . $row['id'] . '"><i class="fa fa-eye"></i></a>';
                    echo '<a href="#" data-toggle="modal" data-target="#modalDelete" class="delete" data-id="' . $row['id'] . '"><i class="fa fa-trash"></i></a>';
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
  </tbody>
</table>
    
                            

    
</body>
</html>