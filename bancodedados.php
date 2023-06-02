<?php
function mysqlConnect()
{
  $host = "localhost";
  $username = "spartan";
  $password = "sparta123";
  $dbname = "AcademiaSpartan";
  $options = [
    PDO::ATTR_EMULATE_PREPARES => false, // desativa a execução emulada de prepared statements
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // ativa o modo de erros para lançar exceções
    PDO::ATTR_PERSISTENT => true, // ativa o uso de conexões persistentes para maior eficiência
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // altera o modo de busca padrão para FETCH_ASSOC
  ];
  try {
    // O objeto $pdo será utilizado nas operações com o BD
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, $options);
    return $pdo;
  } catch (Exception $e) {
    exit('Falha na conexão com o MySQL: ' . $e->getMessage());
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verifica se o formulário foi enviado via método POST

  // Conecta ao banco de dados
  $pdo = mysqlConnect();

  // Obtém os dados do formulário
  $nome = $_POST['Nome'];
  $cpf = $_POST['cpf'];
  $email = $_POST['email'];
  $dataNascimento = $_POST['Data'];
  $telefone = $_POST['tel'];
  $aluno = $_POST['aluno'];
  $atividades = implode(", ", $_POST['exercicio']);
  $motivoContato = $_POST['Comentario'];
  $mensagem = $_POST['Coment'];

  // Insere os dados no banco de dados
  $stmt = $pdo->prepare("INSERT INTO tabela (nome, cpf, email, data_nascimento, telefone, aluno, atividades, motivo_contato, mensagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->execute([$nome, $cpf, $email, $dataNascimento, $telefone, $aluno, $atividades, $motivoContato, $mensagem]);

  echo "Dados inseridos com sucesso.";
}
?>