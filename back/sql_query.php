<?php
session_start();

require 'connection.php';

if ( !isset($_SESSION['verify']) ){ $_SESSION['verify'] = 0; } 

$id  		= (isset($_POST['id'])) ? $_POST['id'] : '';
$placa  		= (isset($_POST['placa'])) ? $_POST['placa'] : '';
$marca  		= (isset($_POST['marca'])) ? $_POST['marca'] : '';
$modelo 		= (isset($_POST['modelo'])) ? $_POST['modelo'] : '';
$cor  			= (isset($_POST['cor'])) ? $_POST['cor'] : '';
$porte  		= (isset($_POST['porte'])) ? $_POST['porte'] : '';
$tipo_de_carga  = (isset($_POST['tipo_de_carga'])) ? $_POST['tipo_de_carga'] : '';
$chassis  		= (isset($_POST['chassis'])) ? $_POST['chassis'] : '';
$btn_envio  	= (isset($_POST['btn_envio'])) ? $_POST['btn_envio'] : '';

if ($btn_envio == 'submit'){

	$conexao = conexao::getInstance(); 
	    $sql = "INSERT INTO cadastroveiculos (placa, marca, modelo, cor, porte, tipo_de_carga, chassis) VALUES (:placa, :marca, :modelo, :cor, :porte, :tipo_de_carga, :chassis)"; 
	    $stm = $conexao->prepare($sql);
	    $stm->bindValue(':placa', $placa);
		$stm->bindValue(':marca', $marca);
		$stm->bindValue(':modelo', $modelo);
		$stm->bindValue(':cor', $cor);
		$stm->bindValue(':porte', $porte);
		$stm->bindValue(':tipo_de_carga', $tipo_de_carga);
		$stm->bindValue(':chassis', $chassis);
	    $stm->execute();	

	$_SESSION['verify'] = 1;

	if ($stm):
            header("Location: http://localhost/sti/index.php");
        endif;
}
if($btn_envio == "delete"){
	$conexao = conexao::getInstance();
        $sql = "DELETE FROM cadastroveiculos WHERE id = :id;";  // Insere os registros
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', $id);
        $stm->execute();

    if ($stm):
            header("Location: http://localhost/sti/consulta.php");
        endif;
}

if($btn_envio == "update"){
	$conexao = conexao::getInstance();
        $sql = "UPDATE cadastroveiculos SET placa=:placa, marca=:marca, cor=:cor, porte=:porte, tipo_de_carga=:tipo_de_carga, chassis=:chassis WHERE id=:id";  // Insere os registros
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', $id);
        $stm->bindValue(':placa', $placa);
        $stm->bindValue(':marca', $marca);
        $stm->bindValue(':cor', $cor);
		$stm->bindValue(':porte', $porte);
		$stm->bindValue(':tipo_de_carga', $tipo_de_carga);
		$stm->bindValue(':chassis', $chassis);
        $stm->execute();

    if ($stm):
            header("Location: http://localhost/sti/consulta.php");
        endif;
}

?>