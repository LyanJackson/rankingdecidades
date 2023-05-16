<?php 
include '../../../web/seguranca.php';

$nomecidade = htmlentities($_POST['nomecidade']);
$estado =  htmlentities($_POST['estado']);

$query = "INSERT INTO cidades(nome_cidade, estado) VALUES ('$nomecidade', '$estado')";


if(mysqli_query($_SG['link'], $query)){

	echo '<script>$(".alerta").addClass("alert-success");</script>';
	echo '<i class="fa fa-check"></i>&ensp;Cidade cadastrada com sucesso!';
}
else {
	echo '<script>$(".alerta").addClass("alert-danger");</script>';
	echo '<i class="fa fa-remove"></i>&ensp;Erro no cadastro, tente novamente mais tarde.';
	echo mysqli_error($_SG['link']);	
}

 ?>