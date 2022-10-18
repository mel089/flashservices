<?php
session_start();
//Só administrador pode acessar o programa.

require 'conexao.php';

// Dados do Formulário
$camponome = $_POST["nome"];
$campoemail = $_POST["email"];
$campotelefone = $_POST["telefone"];
$campodata = date("d/m/Y");
$campostatus = 'aguardando';

//Verifica email duplicado e retorna erro.
$sql = "SELECT * FROM usuario WHERE Email='$campoemail'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	header("Location: usuariocadastrartela.php?erro=2");
	exit;	
}


//O EasyPHP não tem password_hash, por isso deixei as duas opções

//$camposenha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

$camposenha = $_POST["senha"];       

	
//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores dos campos
$sql = "INSERT INTO usuario(nome, email, senha, telefone, acesso, data_acesso, status) VALUES('$camponome', '$campoemail', '$camposenha', '$campotelefone', 'Comum', '$campodata', '$campostatus')";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  //header( "refresh:5;url=login.html" );	
  
  
  //Envie email para validar a conta.
require 'enviaremail.php';  

//Conteúdo do email de validação
$texto = "Clique <a href='127.0.0.1/usuariovalidaremail.php?id=" . $campoemail .">aqui</a>.";

enviaremail($camponome, $campoemail, 'Validar conta', $texto);


} else {
 //header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>