// Cria o modal de edição
function abrirModalEditar(id) {
    $('#editModal').modal({
    backdrop: 'static',
    keyboard: false
});

// Evento de clique no ícone "Editar"
$("#editar").click(function() {
    // Preenche o modal com os dados do usuário
    $("#edit-modal-body").html("<form>Nome: <input type='text' id='edit-nome' value='" + Nome_Completo + "'><br>Email: <input type='text' id='edit-email' value='" + Email_User + "'><br>Telefone: <input type='text' id='edit-telefone' value='" + Tel_User + "'><br><button type='button' class='btn btn-primary' onclick='editarDados("+ id +")'>Salvar</button></form>");
    // Exibe o modal
    $("#editModal").modal("show");
});
}

function abrirModalVisualizar(id) {

// Cria o modal de visualização
$('#viewModal').modal({
    backdrop: 'static',
    keyboard: false
});

// Evento de clique no ícone "Visualizar"
$("#visualizar").click(function() {
    // Preenche o modal com os dados do usuário
    $("modal-bodyl").html("<p>Nome: " + nome + "</p><p>Idade: " + idade + "</p><p>Endereço: " + endereco + "</p>");
    // Exibe o modal
    $("#viewModal").modal("show");
});
}
function abrirModalApagar(id) {
    $('#modalDeletar').modal({
        backdrop: 'static',
        keyboard: false
    });
    
    // Evento de clique no ícone "Visualizar"
    $("#apagar").click(function() {
        // Preenche o modal com os dados do usuário
        $("modalDeletarLabel").html(
    
            
        );
        // Exibe o modal
        $("#modalDeletar").modal("show");
    });
    }


$(document).on('click', '.editar', function(){
    var id = $(this).data('id');
    abrirModalEditar(id);
});

$(document).on('click', '.visualizar', function(){
    var id = $(this).data('id');
    abrirModalVisualizar(id);
});

$(document).on('click', '.apagar', function(){
    var id = $(this).data('id');
    abrirModalApagar(id);
});

function viewData(id) {
    // Faz uma requisição AJAX para pegar os dados do usuário
    $.ajax({
        type: "POST",
        url: "../view/get_user_data.php",
        data: {id: id},
        success: function(response) {
            // Preenche a div com os dados retornados
            $("#view-modal-body").html(response);
            // Exibe o modal
            $("#viewModal").modal();
        }
    });
}


function deletarDados(id){
// Seleciona o botão de apagar
let deleteBtn = document.querySelector("#deleteBtn");

deleteBtn.addEventListener("click", function(){
    // Pega o ID do registro a ser apagado
    let id = this.dataset.id;

    // Cria a requisição AJAX
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../view/delete.php?id=" + id);

    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = xhr.responseText;
            console.log(response);
            // Atualiza a tabela com os novos dados
            // ...
        }
    }

    xhr.send();
});
}

var modalCadastro = document.getElementById("modalCadastro");
var btnCadastro = document.getElementById("btnCadastro");
var closeCadastro = document.getElementById("closeCadastro");

btnCadastro.onclick = function() {
  modalCadastro.style.display = "block";
}

closeCadastro.onclick = function() {
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var cpf = document.getElementById("cpf").value;
    var telefone = document.getElementById("telefone").value;
    var usuario = document.getElementById("usuario").value;
    var senha = document.getElementById("senha").value;

    // Verifica se os campos obrigatórios foram preenchidos
    if (nome == "" || email == "" || cpf == "" || telefone == "" || usuario == "" || senha == "") {
        alert("Todos os campos são obrigatórios");
    } 
    // Verifica se o email é válido
    else if (!validarEmail(email)) {
        alert("Email inválido");
    } 
    // Verifica se o cpf é válido
    else if (!validarCPF(cpf)) {
        alert("CPF inválido");
    } 
    else {
        // Envia os dados para o arquivo PHP responsável por inserir no banco de dados
        $.ajax({
            type: "POST",
            url: "cadastro.php",
            data: {nome: nome, email: email, cpf: cpf, telefone: telefone, usuario: usuario, senha: senha},
            success: function(data) {
                alert(data);
            }
        });
    }
    // Fecha o modal
    modal.style.display = "none";
};

//Função para preencher os dados no modal de visualização
function preencherModalView(nomeCompleto, usuario, email, telefone, cep, endereco, numero, complemento, bairro, cidade, estado, cpf) {
    document.getElementById("nomeCompletoView").innerHTML = nomeCompleto;
    document.getElementById("usuarioView").innerHTML = usuario;
    document.getElementById("emailView").innerHTML = email;
    document.getElementById("telefoneView").innerHTML = telefone;
    document.getElementById("cepView").innerHTML = cep;
    document.getElementById("enderecoView").innerHTML = endereco;
    document.getElementById("numeroView").innerHTML = numero;
    document.getElementById("complementoView").innerHTML = complemento;
    document.getElementById("bairroView").innerHTML = bairro;
    document.getElementById("cidadeView").innerHTML = cidade;
    document.getElementById("estadoView").innerHTML = estado;
    document.getElementById("cpfView").innerHTML = cpf;
}


function mostrarModal(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var info = JSON.parse(this.responseText);
        // preenche os campos do modal com as informações do usuário
        document.getElementById("nome").innerHTML = info.nome;
        document.getElementById("usuario").innerHTML = info.usuario;
        // etc
      }
    };
    xhttp.open("GET", "get_user_data.php?id=" + id, true);
    xhttp.send();
  }
  

  document.getElementById("modalCadastro").addEventListener("submit", function(e){
    e.preventDefault();
    // aqui você pode enviar os dados para o seu script PHP
  });
  