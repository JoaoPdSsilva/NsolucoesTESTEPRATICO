// Adicionando um evento de submit ao formulário
var form = document.getElementById("form-Cadastro");
form.addEventListener("submit", function(event) {
  event.preventDefault();
  
  // Recuperando os valores dos campos do formulário
  var nome = document.getElementById("nomeCompletoCad").value;
  var usuario = document.getElementById("usuarioCad").value;
  var email = document.getElementById("emailCads").value;

  // Enviando os dados via AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "cadastrar.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Exibindo uma mensagem de sucesso
      alert("Cadastro realizado com sucesso!");
    }
  }
  xhr.send("nome=" + nome + "&usuario=" + usuario + "&email=" + email);
});
