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
    <script src="../controller/modal.js"></script>
    <script src="../libs/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../model/login.css">
<script>
  function validaEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validaCPF(cpf) {
  var soma;
  var resto;
  soma = 0;
  if (cpf == "00000000000") return false;

  for (i=1; i<=9; i++) soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
  resto = (soma * 10) % 11;

  if ((resto == 10) || (resto == 11))  resto = 0;
  if (resto != parseInt(cpf.substring(9, 10)) ) return false;

  soma = 0;
  for (i = 1; i <= 10; i++) soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
  resto = (soma * 10) % 11;

  if ((resto == 10) || (resto == 11))  resto = 0;
  if (resto != parseInt(cpf.substring(10, 11) ) ) return false;
  return true;
}



</script>

</head>
<body>
<div class="row">
<div class="col-12">
<h2 class=''>Lista de Usuarios</h2>
<br>


    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalCadastro">Cadastrar</button>
    <a type="button" class="btn btn-outline-danger" data-toggle="modal" href="logout.php">Sair</a>
</div>
</div>
<br>
<br>
<table id="example" class="display" style="width:100%">

        <thead>
        <tr>
    <th class="th-sm">#</th>
    <th class="th-sm">Nome Completo</th>
    <th class="th-sm">Usuário</th>
    <th class="th-sm">Email</th>
    <th class="th-sm">Telefone</th>
    <th class="th-sm">Status</th>
    <th class="th-sm">Ações</th> 
    </tr>
        </thead>
        <tbody>
        <?php
                // Conexão com o banco de dados
                $conn = new mysqli('localhost', 'root', '', 'dbtestepratico');

                $query = "SELECT * FROM users ORDER BY id DESC";
                $result = $conn->query($query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>;';
                    echo '<td>' . $row['Nome_Completo'] . '</td>';
                    echo '<td>' . $row['usuario'] . '</td>';
                    echo '<td>' . $row['Email_User'] . '</td>';
                    echo '<td>' . $row['Tel_User'] . '</td>';
                    echo '<td>' . $row['status_user'] . '</td>';
                    echo '<td>';
                    echo '<a  id="editar" href="edit.php?id=$row[id]" "class="editar data-toggle="modal" data-target="#modalEdit" class="edit" data-id="' . $row['id'] . '"><i class="fa fa-edit"></i></a>';
                    echo '<a  id="visualizar" class="visualizar" data-toggle="modal" data-target="#modalView" class="view" data-id="' . $row['id'] . '"><i class="fa fa-eye"></i></a>';
                    echo '<a  id="apagar" class="apagar" data-toggle="modal" data-target="#modalDelete" class="delete" data-id="' . $row['id'] . '"><i class="fa fa-trash"></i></a>';
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
  </tbody>
</table>
        </tbody>
    </table>
    
           


<!-- Modal de Visualizar -->
<div class="modal" id="viewModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Informações</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>





<!-- Modal de deletar -->
<div class="modal fade" id="modalDeletar" tabindex="-1" role="dialog" aria-labelledby="modalDeletarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDeletarLabel">Deletar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja deletar o registro selecionado?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="deleteBtn" onclick="deletarDados(id)">Deletar</button>
      </div>
    </div>
  </div>
</div>
                
   <!-- Modal de Cadastrar -->
<div class="modal fade" id="modalCadastro">
  
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

      <div class="modal-body">
    <form action="cadastrar.php" method="POST">

      <label for="nomeCompleto">Nome Completo:</label>
      <input type="text" id="nomeCompletoCad" name="nomeCompleto" required><br>

      <label for="usuario">Usuário:</label>
      <input type="text" id="usuarioCad" name="usuario" required><br>

      <label for="emailCads">E-mail:</label>
      <input type="email" id="emailCads" name="emailCads" required><br>

      <label for="telefone">Telefone:</label>
      <input type="tel" id="telefoneCad" name="telefone" required><br>

      <label for="cep">CEP:</label>
      <input type="number" id="cepCad" name="cep" required><br>

      <label for="endereco">Endereço:</label>
      <input type="text" id="enderecoCad" name="endereco" required><br>

      <label for="numero">Número:</label>
      <input type="number" id="numeroCad" name="numero" required><br>

      <label for="complemento">Complemento:</label>
      <input type="text" id="complementoCad" name="complemento" required><br>

      <label for="bairro">Bairro:</label>
      <input type="text" id="bairroCad" name="bairro" required><br>

      <label for="cidade">Cidade:</label>
      <input type="text" id="cidadeCad" name="cidade" required><br>

      <label for="estado">Estado:</label>
      <select id="estadocad" name="estadocad">
    <option value="null" select>Escolha um Estado</option>
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>
    <option value="EX">Estrangeiro</option>
</select>
      <label for="cpf">CPF:</label>
      <input type="number" id="cpfCad" name="cpf" required><br>

      <label for="senha">Senha:</label>
      <input type="password" id="senhaCad" name="senha" required><br>

      <label for="status">Status:</label>
      <select id="status" name="status"><br>
        <option value="Atv" selected>Ativado</option>
       <option value="Dtv">Desativado</option>
       <br>
       <br>

      <Input type="submit" id="submit" class="btn btnCadastro btn-primary"  value="Cadastrar" data-dismiss="modal"></input>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

      </form>
  </div>
</div>
 </div>
</div>


</body>
</html>