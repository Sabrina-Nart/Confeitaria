<?php
	include('validar.php');
	include('conexao.php');

	$texto = $_GET['texto'];
	
	$sql = "SELECT id, nome, especialidade, telefone, data_contratacao FROM confeiteiro WHERE nome LIKE '%{$texto}%'";

	$query = mysqli_query($con, $sql);

	if(!$query) {
?>
			<tr>
				<td colspan="4"><?php echo 'Erro no banco: ' . mysqli_error($con); ?></td>
			</tr>
<?php
	} else {
		if(mysqli_num_rows($query) == 0) {
?>
			<tr>
				<td colspan="4">Não foram encontrados dados!</td>
			</tr>
<?php	
		} else {
			while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
			<tr>
                <td><?php echo $arr['id']; ?></td>
				<td><?php echo $arr['nome']; ?></td>
                <td><?php echo $arr['especialidade']; ?></td>
                <td><?php echo $arr['data_contratacao']; ?></td>
					
				<td>
					<a href="alterar_confeiteiro.php?id=<?php echo $arr['id']; ?>">Alterar</a>
					
					<a class="excluir">Excluir</a>
				</td>
			</tr>
<?php
			}
		}
	}

	mysqli_close($con);
?>