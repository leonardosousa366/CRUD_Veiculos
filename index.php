<?php 
session_start();

?> 
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STI - veiculos</title>
	<!-- CSS -->
	<link href="assets/css/style.css" rel="stylesheet" crossorigin="anonymous">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<!-- Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Yantramanav&display=swap" rel="stylesheet">
</head>
<body>
	<section class="sti">
		<div class="cotainer-fluid">
			<div class="col-md-12 text-center">
				<h1>Cadastro do veículo</h1>
				<form id="CadastroVeiculos" method="POST" action="back/sql_query.php">
					<div class="row">
						<input type="text" id="placa" class="campo1 form-control" name="placa" placeholder="Insira a placa do veículo" required="">
						<input type="text" id="marca" class="campo2 form-control" name="marca" placeholder="Qual a marca do veículo?" required="">
					</div><!-- row -->
					<div class="row">
						<input type="text" id="modelo" class="campo3 form-control" name="modelo" placeholder="Qual o modelo do veículo?" required="">
						<input type="text" id="cor" class="campo4 form-control" name="cor" placeholder="Insira a cor do veículo?" required="">
					</div><!-- row -->
					<div class="row">
						<input type="text" id="porte" class="campo5 form-control" name="porte" placeholder="Indique o porte do veículo" required="">
						<input type="text" id="tipo_de_carga" class="campo6 form-control" name="tipo_de_carga" placeholder="Qual é o tipo de carga transportada" required="">
					</div><!-- row -->
					<div class="row rowbtn">
						<input type="text" id="chassis" class="campo7 form-control" name="chassis" placeholder="Qual é o chassis?" required="">
						<button type="submit" name="btn_envio" class="btnEnvio" id="btnEnvio" value="submit" aria-live="assertive" data-alt-text="Enviando..." data-submit-text="Enviar">Registrar</button>
					</div><!-- row -->
				</form>
				<?php
				if($_SESSION['verify'] == 1){ 
					echo '<span id="mensagem">Cadastrado com sucesso!</span>';
					$_SESSION['verify'] = 0;
				}
				?>
				<span class="consulta"><a href="consulta.php">Deseja consultar os veículos já cadastrados?</a></span>
			</div><!-- col-md-12 -->
		</div><!-- container -->
	</section><!-- section -->
<!-- JS -->
<script src="assets/js/jquery.min.js" crossorigin="anonymous"></script>
<script defer src="assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script defer src="assets/js/main.js" crossorigin="anonymous"></script>
</body>
</html>