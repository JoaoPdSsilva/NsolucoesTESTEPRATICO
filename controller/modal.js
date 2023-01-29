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
    $("modal-bodyl").html("<p>Nome: " + $nome + "</p><p>Idade: " + idade + "</p><p>Endereço: " + endereco + "</p>");
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