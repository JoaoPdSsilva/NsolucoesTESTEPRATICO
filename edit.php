                <!-- Modal de Editar -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarLabel">Editar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body" id="edit-modal-body">
      <div class="modal-body" id="view-modal-body">

    <form action="get_user_data.php" method="GET">
    <label for="nomeCompletoView">Nome Completo:</label>
    <input type="text" id="nomeCompletoView" ></input>

    <label for="usuarioView">Usuário:</label>
    <input type="text" id="usuarioView" ></input>

    <label for="emailView">E-mail:</label>
    <input  type="email" id="email" ></input>

    <label for="telefoneView">Telefone:</label>
    <input type="number" id="telefoneView" ></input>

    <label for="cepView">CEP:</label>
    <input type="number" id="cepView" ></input>

    <label for="enderecoView">Endereço:</label>
    <input type="text" id="enderecoView"  ></input>

    <label for="numeroView">Número:</label>
    <input type="number" id="numeroView"  ></input>

    <label for="complementoView">Complemento:</label>
    <input type="text" id="complementoView" ></input>

    <label for="bairroView">Bairro:</label>
    <input type="text" id="bairroView" ></input>

    <label for="cidadeView">Cidade:</label>
    <input type="text" id="cidadeView" ></input>

    <label for="estadoView">Estado:</label>
    <select id="estado" name="estado" >
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

    <label for="cpfView">CPF:</label>
    <input type="number" id="cpf" ></input>
    </div>      
  </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary" id="salvarEdicao">Salvar Alterações</button>
      </div>
    </div>
  </div>
</div>  
</form> 