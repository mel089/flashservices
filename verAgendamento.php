<?php
session_start();

//Faz a conexão com o BD.
require 'conexao.php';

$servico = $_GET['servico'];

$sql = "SELECT agendamento.id, agendamento.data, agendamento.hora, agendamento.descricao, agendamento.endereco, usuario.nome, servico.servico FROM agendamento INNER JOIN usuario ON agendamento.usuario_id = usuario.id INNER JOIN servico ON agendamento.servico_id = servico.id WHERE agendamento.id = '$servico'";

$result = $conn -> query($sql);
$row = $result->fetch_assoc();

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oportunidade de serviço</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Open+Sans:wght@300;400;500;600&display=swap');
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}

body {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #696969;
}

.container {
    width: 80%;
    height: 80vh;
    display: flex;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.212);
}

.form-image {
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #A9A9A9;
    padding: 1rem;
}

.form-image img {
    width: 31rem;
}

.form {
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #fff;
    padding: 2rem;
}

.form-header {
    margin-bottom: 3rem;
    display: flex;
    justify-content: space-between;
}

.login-button {
    display: flex;
    align-items: center;
}

.login-button button {
    border: none;
    background-color: #c0c1c4;
    padding: 0.4rem 1rem;
    border-radius: 5px;
    cursor: pointer;
}

.login-button button:hover {
    background-color: #403c91f1;
}

.login-button button a {
    text-decoration: none;
    font-weight: 500;
    color: #fff;
}

.form-header h1::after {
    content: '';
    display: block;
    width: 3rem;
    height: 0.3rem;
    background-color: #6c63ff;
    margin: 0 auto;
    position: absolute;
    border-radius: 10px;
}

.input-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 1rem 0;
}

.input-box {
    display: flex;
    flex-direction: column;
    margin-bottom: 1.1rem;
}

.input-box input {
    margin: 0.6rem 0;
    padding: 0.8rem 1.2rem;
    border: none;
    border-radius: 10px;
    box-shadow: 1px 1px 6px #0000001c;
    font-size: 0.8rem;
}

.input-box input:hover {
    background-color: #eeeeee75;
}

.input-box input:focus-visible {
    outline: 1px solid #6c63ff;
}

.input-box label,
.gender-title h6 {
    font-size: 0.75rem;
    font-weight: 600;
    color: #000000c0;
}

.input-box input::placeholder {
    color: #000000be;
}

.continue-button input{
    width: 100%;
    margin-top: 2.5rem;
    border: none;
    background-color: #6c63ff;
    padding: 0.62rem;
    border-radius: 5px;
    cursor: pointer;
}

.continue-button input:hover {
    background-color: #4f4b92f1;
}

.continue-button input a {
    text-decoration: none;
    font-weight: 500;
    color: #fff;
}

@media screen and (max-width: 1330px) {
    .form-image {
        display: none;
    }
    .container {
        width: 50%;
    }
    .form {
        width: 100%;
    }
}

@media screen and (max-width: 1064px) {
    .container {
        width: 90%;
        height: auto;
    }
    .input-group {
        flex-direction: column;
        z-index: 5;
        padding-right: 5rem;
        max-height: 10rem;
        overflow-y: scroll;
        flex-wrap: nowrap;
    }
    .gender-inputs {
        margin-top: 2rem;
    }
    .gender-group {
        flex-direction: column;
    }
    .gender-title h6 {
        margin: 0;
    }
    .gender-input {
        margin-top: 0.5rem;
    }
} 
 1  
assets/img/undraw_
assets/img/undraw_

.content{
     margin: 30px;
    }
.botao01{
     background: -webkit-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
     background: -moz-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
     background: -o-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
     background: -ms-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
     background: linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
     border: 1px solid #CCCCCE;
     border-radius: 3px;
     box-shadow: 0 3px 0 rgba(0, 0, 0, .3),
                   0 2px 7px rgba(0, 0, 0, 0.2);
     color: #616165;
     display: block;
     font-family: "Trebuchet MS";
     font-size: 14px;
     font-weight: bold;
     line-height: 25px;
     text-align: center;
     text-decoration: none;
     text-transform: uppercase;
     text-shadow:1px 1px 0 #FFF;
     padding: 5px 15px;
     position: relative;
     width: 80px;
}
 
.botao01:before{
     border: 1px solid #FFF;
     border-radius: 3px;
     box-shadow: inset 0 -2px 12px -4px rgba(70, 70, 70, .2),
                   inset 0 3px 2px -1px rgba(255, 255, 255, 1);
     content: "";
     bottom: 0;
     left: 0;
     right: 0;
     top: 0;
     padding: 5px;
     position: absolute;
    }
 
    .botao01:after{
     background: rgba(255, 255, 255, .4);
     border-radius: 2px;
     content: "";
     bottom: 15px;
     left: 0px;
     right: 0px;
     top: 0px;
     position: absolute;
    }
 .botao01:active{
     box-shadow: inset 0 0 7px rgba(0, 0, 0, .2);
     top: 4px;
    }
    .botao01:active:before{
     border: none;
     box-shadow:none;
    }


</style>

<body>
    <div class="container">
        <div class="form-image">
            <img src="undraw_join_re_w1lh.svg" alt="">
        </div>
        <div class="form">
                <div class="form-header">
                    <div class="title">
                        
                    </div>
                    <body>
					<ul>
    <li><p>Nome: <?php echo $row['nome']?></p></li>
	<br>
   <li> <p>Serviço: <?php echo $row['servico']?></p></li>
   <br>
    <li><p>Endereço: <?php echo $row['endereco']?></p></li>
	<br>
   <li> <p>Data: <?php echo $row['data']?></p></li>
   <br>
    <li><p>Hora: <?php echo $row['hora']?></p></li>
	<br>
   <li> <p>Descrição: <?php echo $row['descricao']?></p></li>
   <br>
    <li><a href="aceitarServico.php?agendamento=<?= $row['id']?>"class="botao01">Aceitar</a></li>
</body>

                </div>
            </form>
        </div>
    </div>
</body>

</html> 