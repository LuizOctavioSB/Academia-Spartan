<!DOCTYPE html>
<html lang="pt-br">
<head>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ex-Professores</title>
</head>
<body>
  <?php 
    include "Header.php";
  ?>
  <h1>Ex-Professores</h1>
  <main>

  <h2>Bem-vindo à página dos ex-professores!</h2>

  <p>Aqui você encontrará uma tabela com informações sobre os ex-professores que
     fizeram parte da nossa instituição ao longo dos anos. Esses profissionais contribuíram
      para o crescimento e sucesso de nossa escola, deixando sua marca e compartilhando seu
      conhecimento com os alunos.</p>

  <p>Através desta página, queremos prestar uma homenagem a esses educadores talentosos,
     destacando seus nomes, anos de contratação e ano de saída. É uma forma de reconhecer
      o papel fundamental que desempenharam em nossa comunidade escolar.</p>

  <p>Agradecemos a dedicação e o compromisso de cada ex-professor em moldar mentes, inspirar
     e desafiar nossos alunos a alcançarem seu pleno potencial. Seus esforços ajudaram a criar
      um ambiente de aprendizagem enriquecedor e impactaram positivamente a vida de muitas pessoas.</p>

  <p>Aproveite para explorar a tabela e conhecer um pouco mais sobre aqueles que contribuíram para
     a história da nossa instituição. Caso tenha alguma dúvida ou precise de mais informações,
      não hesite em entrar em contato conosco.</p>


    <?php
    // Array de ex-professores com seus anos iniciais e finais
    $exProfs = array(
      array("Nome do Professor 1", 2010, 2015),
      array("Nome do Professor 2", 2012, 2016),
      array("Nome do Professor 3", 2014, 2017),
      array("Nome do Professor 4", 2015, 2018),
      array("Nome do Professor 5", 2016, 2019),
      array("Nome do Professor 6", 2017, 2020),
      array("Nome do Professor 7", 2018, 2021),
      array("Nome do Professor 8", 2019, 2022),
      array("Nome do Professor 9", 2020, 2023),
      array("Nome do Professor 10", 2021, 2024)
    );
    
    // Verifica se o array não está vazio
    if (!empty($exProfs)) {
      echo "<table>";
      echo "<tr><th>Nome</th><th>Ano de Contratação</th><th>Ano de Saída</th></tr>";
      // Percorre o array e exibe cada entrada como uma linha da tabela
      foreach ($exProfs as $prof) {
        echo "<tr>";
        echo "<td>{$prof[0]}</td>";
        echo "<td>{$prof[1]}</td>";
        echo "<td>{$prof[2]}</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "Não há ex-professores registrados.";
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $("table tr:even").css("background-color", "#f2f2f2");
        $("table tr:odd").css("background-color", "#ffffff");
      });
    </script>

  </main>
  
</body>
</html>
