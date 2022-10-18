<?php
session_start();
//Verifica se o usuário está logado.
require 'acessocomum.php';

//Faz a conexão com o BD.
require 'conexao.php';

//Ler os valores enviados pelo formulário
$date=filter_input(INPUT_POST,'date',FILTER_DEFAULT); /* data */
$time=filter_input(INPUT_POST,'time',FILTER_DEFAULT); /* hora */
$usuario_id = $_SESSION["id"];
$endereco = $_POST["endereco"];
$descricao = $_POST["descricao"];
$camposervico_id = $_POST["servico_id"];

//Montar o DateTime do start e do end usando os dados do form
$start=new \DateTime($date.' '.$time, new \DateTimeZone('America/Sao_Paulo'));
$end = new \DateTime($date.' '.$time, new \DateTimeZone('America/Sao_Paulo'));

//Soma 40 minutos no end (tempo do duração do evento)
$end = $end->modify('+40 minutes')->format("Y-m-d H:i:s");
$start = $start->format("Y-m-d H:i:s");

//Insere na tabela os valores dos campos
$sql = "INSERT INTO agendamento (data, hora, usuario_id, endereco, descricao, start, end, color, servico_id) 
VALUES('$date', '$time', '$usuario_id', '$endereco', '$descricao', '$start', '$end', 'blue', '$camposervico_id')";


//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  //header( "refresh:5;url=eventoscontrolar.html" );	
  echo "Gravado com sucesso. <br>";

//Envie email para validar a conta.
require 'enviaremail.php';  

//Conteúdo do email de aviso
/* SELEECIONA OS PROFISSIONAIS SELECIONADO NO FORMULÁRIO DE CA*/
$sql1 = "SELECT 
			profissional.id,
			profissional.usuario_id,
			profissional.servico_id,
			servico.id,
			servico.servico,
			usuario.id, /* mesmo nome pra id */ 
			usuario.email,
			usuario.nome
			FROM
			profissional
			INNER JOIN 
			usuario
			ON profissional.usuario_id = usuario.id
			INNER JOIN
			servico 
			ON profissional.servico_id = servico.id
			where profissional.servico_id=$camposervico_id
";

$result = $conn->query($sql1);

$texto = "Um serviço foi agendado para a data <?='$data'?> no horario <?='$time'?>";


if($result){
	while($row = $result->fetch_assoc()) {
			$campoemail = $row['email'];
			$camponome = $row['nome'];
					enviaremail($camponome, $campoemail, 'Nova oportunidade de trabalho', $texto);
			}
		}
} else {
  //header( "refresh:5;url=eventoscontrolar.html" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();

?>