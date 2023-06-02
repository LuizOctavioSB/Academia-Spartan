<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academia Spartan - Suporte</title>
</head>

<body>
  <?php
  include "Header.php";
  ?>

  <main>
    <h3 class="bemVindos">Insira seus dados abaixo:</h3>

    <form action="AcademiaSpartanAgrad.php" method="post" id="form">
      <div>
        <aside class="borda">
          <h3>Especialidades:</h3>
          <ol class="listaForm">
            <li>
              <h4>Dança</h4>
              <ul class="listaProfs">
                <li>Prof. Alessandra Maria </li>
                <li>Prof. Douglas Rogerio</li>
                <li>Prof. Silvana Silva</li>
              </ul>
            </li>

            <li>
              <h4>Musculação</h4>
              <ul class="listaProfs">
                <li>Prof. Leonardo Pereira </li>
                <li>Prof. Luiz Paulo </li>
                <li>Prof. Vanessa </li>
              </ul>
            </li>

            <li>
              <h4>Spinning</h4>
              <ul class="listaProfs">
                <li>Prof. Angelo Romero </li>
                <li>Prof. Cassio Ramos </li>
                <li>Prof. Felipe Luiz </li>
              </ul>
            </li>
          </ol>
        </aside>

        <fieldset id="dados" class="borda" onsubmit="return validarFormulario()">
          <legend>Dados:</legend>
          <ol class="listaForm">
            <li class="form-field">
              <label for="nome">Nome completo*</label>
              <br>
              <input type="text" id="nome" name="Nome" class="boxTextForm">
              <small></small>
            </li>

            <li class="form-field">
              <label for="cpf">Cpf*</label>
              <br>
              <input type="text" id="cpf" name="cpf" class="boxTextForm" maxlength="11">
              <small></small>
            </li>

            <li class="form-field">
              <label for="email">E-mail*</label>
              <br>
              <input type="text" id="email" name="email" class="boxTextForm">
              <small></small>
            </li>

            <li>
              <label for="Data">Data de Nascimento</label>
              <br>
              <input type="date" id="Data" name="Data" class="boxTextForm">
            </li>

            <li>
              <label for="tel">Telefone</label>
              <br>
              <input type="tel" id="tel" name="tel" class="boxTextForm">
            </li>
          </ol>
        </fieldset>

        <fieldset id="aluno" class="borda">
          <legend>Já é aluno?</legend>
          <ol class="listaForm">
            <li>
              <input type="radio" id="Aluno" name="aluno" value="Sim">
              <label for="Aluno">Sim</label>
            </li>

            <li>
              <input type="radio" id="ALUNO" name="aluno" value="Não">
              <label for="Aluno">Não</label>
            </li>
          </ol>
        </fieldset>
      </div>

      <fieldset id="atividade" class="borda">
        <legend>Escolha a atividade de seu interesse:</legend>
        <ol class="listaForm">
          <li class="form-field">
            <input type="checkbox" id="Dança" name="exercicio" value="Dança">
            <label for="Dança">Dança</label>
            <input type="checkbox" id="Musculação" name="exercicio" value="musculação">
            <label for="Musculação">Musculação</label>
            <input type="checkbox" id="Spinning" name="exercicio" value="Spping">
            <label for="Spinning">Spinning</label>
            <small></small>
          </li>
        </ol>
      </fieldset>

      <fieldset id="Comentario" class="borda">
        <legend>Motivo do Contato:</legend>
        <div>
          <label for="comentario"></label> <br>
          <select name="Comentario" id="comentario" class="boxTextForm">
            <option disabled value="EST">Selecione:</option>
            <option value="duvida">Dúvida</option>
            <option value="sugestao">Sugestão</option>
            <option value="Reclamação">Reclamação</option>
          </select>
          <br>
          <textarea name="Coment" id="coment" cols="30" rows="10" maxlength="2000" class="boxTextForm"></textarea> <br>
          <input type="file" class="boxTextForm">
        </div>
        <br>
        <input type="submit" value="Enviar" class="boxTextForm">
        <input type="reset" value="Limpar" class="boxTextForm">
      </fieldset>
    </form>

    <div id="mensagem">
      <h3>Mensagem:</h3>
    </div>
    <?php
    require " . ./bancodedados.php";
    $pdo = mysqlConnect();
    ?>
  </main>

  <footer class="rodape">
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="acad.js"></script>
</body>

</html>