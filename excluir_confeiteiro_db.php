<?php
	include('conexao.php');

	$id = $_GET['id'];
	
	$sql = "DELETE FROM confeiteiro WHERE id = '{$id}'";

	$query = mysqli_query($con, $sql);

	if(!$query) {
		$arr['tipo'] = 'erro';
		$arr['msg'] = mysqli_error($con);
	} else {
		$arr['tipo'] = 'ok';
		$arr['msg'] = "Confeiteiro excluido com sucesso! Confeiteiro código: {$id}";
	}
	
	echo json_encode($arr);

	mysqli_close($con);
?>