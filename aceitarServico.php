<?php
session_start();

//Faz a conexão com o BD.
require 'conexao.php';

$agendamento = $_GET['agendamento'];
$id=$_SESSION['id'];

$sql = "SELECT id FROM profissional WHERE usuario_id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$profissional_id = $row['id'];

$sql2 = "UPDATE agendamento SET profissional_id = '$profissional_id' WHERE id = '$agendamento'";

$sql3 = "SELECT * FROM usuario INNER JOIN agendamento ON usuario.id = agendamento.usuario_id WHERE agendamento.id='$agendamento'";
$result2 = $conn->query($sql3);
$row2 = $result2->fetch_assoc();
$camponome = $row2['nome'];
$campoemail = $row2['email'];

$texto = "Seu serviço foi aceito.";
//Envie email para validar a conta.
require 'enviaremail.php';  

enviaremail($camponome, $campoemail, 'Serviço aceito', $texto);

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql2) === TRUE){
     header('Location: principal.php'); //Redireciona para o controle  
  }else{
    echo "Erro: " . $conn->error;
  }
?>

