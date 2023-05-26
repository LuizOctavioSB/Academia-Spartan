<?php
// Recupera os dados do formulário
$nome = sanitizeInput($_POST['Nome']);
$cpf = sanitizeInput($_POST['cpf']);
$email = sanitizeInput($_POST['email']);
$dataNascimento = sanitizeInput($_POST['Data']);
$telefone = sanitizeInput($_POST['tel']);
$aluno = sanitizeInput($_POST['aluno']);
$atividades = sanitizeInput($_POST['exercicio']);
$motivoContato = sanitizeInput($_POST['Comentario']);
$comentario = sanitizeInput($_POST['Coment']);

// Função para sanitizar os dados de entrada
function sanitizeInput($data) {
  // Remove espaços em branco no início e no final
  $data = trim($data);
  // Remove barras invertidas adicionadas automaticamente
  $data = stripslashes($data);
  // Converte caracteres especiais em entidades HTML
  $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
  return $data;
}

// Exibe os dados do usuário
echo "<h3>Dados do Usuário:</h3>";
echo "<p><strong>Nome:</strong> " . $nome . "</p>";
echo "<p><strong>CPF:</strong> " . $cpf . "</p>";
echo "<p><strong>E-mail:</strong> " . $email . "</p>";
echo "<p><strong>Data de Nascimento:</strong> " . $dataNascimento . "</p>";
echo "<p><strong>Telefone:</strong> " . $telefone . "</p>";
echo "<p><strong>Já é aluno:</strong> " . $aluno . "</p>";
echo "<p><strong>Atividade de interesse:</strong> " . $atividades . "</p>";
echo "<p><strong>Motivo do Contato:</strong> " . $motivoContato . "</p>";
echo "<p><strong>Comentário:</strong> " . $comentario . "</p>";
?>
