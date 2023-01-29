const cadForm = document.getElementById("cadastrar");
console.log(cadForm); // null


if (cadForm) {
  // Not called
  cadForm.addEventListener("submit", async (e) => {
    e.preventDefault();
  
    const dadosForm = new FormData(cadForm);
  
    const dados = await fetch("../view/cadastrar.php", {
      method: "POST", 
      body: dadosForm
    })
  
    const resposta = await dados.json();
    
    console.log(resposta)
  })
  };
