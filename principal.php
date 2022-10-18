<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:index.html');
  exit;
}

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];


//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM servico ORDER BY id";

//Executa o SQL
$result = $conn->query($sql);

?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

  <title>Flash Services</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="styleprincipal.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
   
    

</head>

<body>
<header>
    <nav>
     <p>Flash Service</p>
	 
<div class="topnav">
<?php
	//Coloca o menu que está no arquivo
	include 'menu.php';
?>
</div>
 
    </nav>
     
    </div>
</header>

<section class="about">

   <div class="image">
      <img src="images/about-img.jpg" alt="">
   </div>

   <div class="content">
   
   <section class="anuncio">
    <a href="https://practicum.com/pt-bra/"> <img src="images/ti.png" alt="anuncio">
	</section>
   
      <h3>Quem somos?</h3>
      <p>Clientes e Profissionais</h3>
           <p>Viemos para aproximar clientes e profissionais de forma simples, rápida e colaborativa!

            Faça parte dessa parceria você também</p>
      <p>Você vai encontrar vários prestadores de serviços que podem te atender e estão próximos de você.
            
            Entre em contato com quantos profissionais quiser e converse diretamente com eles.</p>
      <div class="icons-container">
         <div class="icons">
            <i class="fas fa-map"></i>
            <span>Atendimento rapido</span>
         </div>
         <div class="icons">
            <i class="fas fa-hand-holding-usd"></i>
            <span>Escolha de orçamentos</span>
         </div>
         <div class="icons">
            <i class="fas fa-headset"></i>
            <span>24 horas de serviço</span>
         </div>
         <div class="image">
            <img src="images/icon_site.png" alt="image">
         </div>
      
      </div>
   </div>

</section>

<!-- about section ends -->


<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> Duvidas</a>
         <a href="#"> <i class="fas fa-angle-right"></i> Sobre nos</a>
         <a href="#"> <i class="fas fa-angle-right"></i> Politica da empresa</a>
         <a href="#"> <i class="fas fa-angle-right"></i> categorias</a>
      </div>

      <div class="box">
         <h3>contatos</h3>
         <a href="#"> <i class="fas fa-phone"></i> +(21)9999-9999 </a>
         <a href="#"> <i class="fas fa-phone"></i> +(21)9999-9999 </a>
         <a href="http://gmail.com/"> <i class="fas fa-envelope"></i> Flashservices@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> RJ, Brasil - 20270-001 </a>
      </div>

      <div class="box">
         <h3>Nos siga</h3>
         <a href="https://pt-br.facebook.com/"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="https://www.instagram.com/"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="https://www.instagram.com/"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="https://br.linkedin.com/"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

   <div class="credit"> <span>© 2022 - Todos os direitos reservados | FLASH SERVICES | CNPJ : 27.227.433/0001-96</span>  </div>

</section>

<!-- footer section ends -->