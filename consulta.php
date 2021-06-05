<?php
session_start(); 

require 'back/connection.php';

$pdo		= 	conexao::getInstance();
$getCampos	= 	$pdo->prepare('SELECT * FROM cadastroveiculos;');
$getCampos	->	execute();
$campos 	= 	$getCampos->fetchAll();

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
	<section class="sti consulta">
		<div class="cotainer-fluid">
			<div class="col-md-12 resultado">
				<h1>Veículo cadastrados</h1>
				 <?php
					if(empty($campos)):
				?>
					<h4 class="falta">Não existem veículos cadastrados</h4>
				<?php
					endif;
				?>
				<?php
					foreach ($campos as $campo):
				?>
				<fieldset>
					<form id="CadastroVeiculos" method="POST" action="back/sql_query.php">
					<legend>
						<span class="linha placa">
							<strong>Placa:</strong> 
							<input type="text" id="placa" name="placa" value="<?php echo $campo['placa'] ?>" required="">
						</span>
					</legend>

					<div class="row-resultado">
						<span class="linha">
							<strong>Marca:</strong>
							<input type="text" id="marca"name="marca" value="<?php echo $campo['marca'] ?>" required="">
						</span>
						<span class="linha">
							<strong>Modelo:</strong>
							<input type="text" id="modelo" name="modelo" value="<?php echo $campo['modelo'] ?>" required=""> 
						</span>
					</div>

					<div class="row-resultado">
						<span class="linha">
							<strong>Cor:</strong>
							<input type="text" id="cor" name="cor" required="" value="<?php echo $campo['cor'] ?>">
						</span>
						<span class="linha">
							<strong>Porte:</strong>
							<input type="text" id="porte" name="porte" value="<?php echo $campo['porte'] ?>" required="">
							</span>
					</div>

					<div class="row-resultado">
						<span class="linha">
							<strong class="max-content">Tipo de carga:</strong>
							<input type="text" id="tipoDeCarga" name="tipo_de_carga" value="<?php echo $campo['tipo_de_carga'] ?>" required="">
							</span>
						<span class="linha">
							<strong>Chassi:</strong>
							<input type="text" id="chassis" name="chassis" value="<?php echo $campo['chassis'] ?>" required="">
						</span><br>
					</div>

						<input type="text" class="d-none" name="id" id="id" value="<?php echo $campo['id'] ?>">
						<button type="submit" value="update" name="btn_envio">Editar</button>
					</form>

					<form id="CadastroVeiculos" class="form2" method="POST" action="back/sql_query.php">
						<input type="text" class="d-none" name="id" id="id" value="<?php echo $campo['id'] ?>">
						<button type="submit" value="delete" name="btn_envio">Excluir</button>
					</form>

				</fieldset>
				<?php
					endforeach;
				?>
				<span class="consulta"><a href="index.php">Deseja cadastrar novos veículos?</a></span>
			</div><!-- col-md-12 -->
		</div><!-- container -->
	</section><!-- section -->
<!-- JS -->
<script src="assets/js/jquery.min.js" crossorigin="anonymous"></script>
<script defer src="assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script defer src="assets/js/main.js" crossorigin="anonymous"></script>
</body>
</html>