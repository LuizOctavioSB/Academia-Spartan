<!DOCTYPE html>
<html lang="pt-br">
<head>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academia Spartan - Professores</title>
</head>
<body>
  <?php 
    include "Header.php";
  ?>
  <h1>Professores Ativos</h1>
  <main>

  <h2>Bem-vindo à página dos professores ativos da Academia Spartan!</h2>

  <p>Aqui você encontrará uma lista completa dos professores dedicados e qualificados
     que fazem parte da nossa equipe na Academia Spartan. Somos uma instituição comprometida
      em oferecer um ambiente de treinamento de alta qualidade, proporcionando aos nossos
       alunos a melhor experiência fitness possível.</P>

  <p>Nossos professores são profissionais experientes e apaixonados pelo que fazem. Cada um deles
     possui expertise em diferentes áreas do fitness, como musculação, aeróbica, artes marciais,
     ioga e muito mais. Eles são especializados em ajudar os alunos a atingir seus objetivos,
     seja para melhorar a forma física, aumentar a força, perder peso ou simplesmente levar uma vida mais saudável.</p>

<p>Além de sua experiência e conhecimento, nossos professores têm um compromisso genuíno com o bem-estar e o sucesso
   de cada aluno. Eles estão sempre prontos para oferecer orientações, suporte e motivação, criando um ambiente encorajador
   e acolhedor para todos.</p>

    <?php
    // Array de professores ativos
    $profs = array(
      "Professor 1",
      "Professor 2",
      "Professor 3",
      "Professor 4",
      "Professor 5",
      "Professor 6",
      "Professor 7",
      "Professor 8",
      "Professor 9",
      "Professor 10"
    );
    
    // Checa se o array nao esta vazio
    if (!empty($profs)) {
      echo "<ul>";
      // Loop que percorre a matriz de professores e exibe cada nome como um item de lista
      foreach ($profs as $prof) {
        echo "<li>$prof</li>";
      }
      echo "</ul>";
    } else {
      echo "Não há professores ativos no momento.";
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $("ul li:even").css("color", "blue");
        $("ul li:odd").css("color", "red");
      });
    </script>

  </main>
  
</body>
</html>
