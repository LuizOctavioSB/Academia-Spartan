<?php
function mysqlConnect()
{
  $host = "localhost";
  $servername = "academiaspartan";
  $username = "spartan";
  $password = "spartan123";
  $dbname = "academiaspartan";
  $options = [
    PDO::ATTR_EMULATE_PREPARES => false, // desativa a execução emulada de prepared statements
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // ativa o modo de erros para lançar exceções
    PDO::ATTR_PERSISTENT => true, // ativa o uso de conexões persistentes para maior eficiência
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // altera o modo de busca padrão para FETCH_ASSOC
  ];
  try {
    // O objeto $pdo será utilizado nas operações com o BD
    $pdo = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8mb4", $username, $password, $options);
    echo "conexão efetuada com sucesso";
    return $pdo;
  } catch (Exception $e) {
    exit('Falha na conexão com o MySQL: ' . $e->getMessage());
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $pdo = mysqlConnect();

  $nome = $_POST['Nome'];
  $cpf = $_POST['cpf'];
  $email = $_POST['email'];
  $dataNascimento = $_POST['Data'];
  $telefone = $_POST['tel'];
  $aluno = $_POST['aluno'];
  $atividades = implode(", ", $_POST['exercicio']);
  $motivoContato = $_POST['Comentario'];
  $mensagem = $_POST['Coment'];

  $stmt = $pdo->prepare("INSERT INTO tabela (nome, cpf, email, data_nascimento, telefone, aluno, atividades, motivo_contato, mensagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->execute([$nome, $cpf, $email, $dataNascimento, $telefone, $aluno, $atividades, $motivoContato, $mensagem]);

  if ($stmt->rowCount() > 0) {
    echo "Dados salvos com sucesso!";

    echo "<h3>Dados inseridos:</h3>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>CPF:</strong> $cpf</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Data de Nascimento:</strong> $dataNascimento</p>";
    echo "<p><strong>Telefone:</strong> $telefone</p>";
    echo "<p><strong>Aluno:</strong> $aluno</p>";
    echo "<p><strong>Atividades:</strong> $atividades</p>";
    echo "<p><strong>Motivo do Contato:</strong> $motivoContato</p>";
    echo "<p><strong>Mensagem:</strong> $mensagem</p>";
  } else {
    // Ocorreu um erro ao salvar os dados
    echo "Erro ao salvar os dados. Por favor, tente novamente.";
  }
}
?>