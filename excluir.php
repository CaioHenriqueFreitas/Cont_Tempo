<html>
<head>
	<link rel="stylesheet" href="./material.min.css">
	<link rel="stylesheet" href="./my-style.css">	
	<script src="./material.min.js"></script>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js">
	<link rel="stylesheet" href="https://code.jquery.com/jquery-1.11.1.min.js">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body bgcolor="#E0E4CC" >
<br><br>	
<?php
	if (mysql_connect('localhost','root','')) {
		if (mysql_select_db('Cont_Tempo')) 
		{
			if (@$_GET['excluir']!=null){
				$contador=1;
				while ($contador<=$_GET['num_reg']){
				$query=@mysql_query('DELETE from Cadastro WHERE id='.$_GET['cadastro'.$contador].';');
				$query=@mysql_query('DELETE from Ptriagem WHERE id='.$_GET['ptriagem'.$contador].';');
				$query=@mysql_query('DELETE from Triagem WHERE id='.$_GET['triagem'.$contador].';');
				$query=@mysql_query('DELETE from Coleta WHERE id='.$_GET['coleta'.$contador].';');
				$contador++;
				}
			}
		}
	}		
	
?>	
<div align="center">	
	<table id="example" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp ">
		<thead>
			<tr>
				<th></th>
				<th class="mdl-data-table__cell--non-numeric">Processo</th>
				<th>Hora</th>
				<th>Situação</th>
			</tr>
		</thead>
	<tbody>
	<?php
	echo '<form	method="get" action="confirm_delete.php">';
	if (mysql_connect('localhost','root','')) {
		if (mysql_select_db('Cont_Tempo')) 
			{
			$contador=0;																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																			
			$query=mysql_query('SELECT id,time,in_out from Cadastro where id_donator='.$_GET['id_donator'].'; ');
			while ($result = mysql_fetch_array($query)){
				$contador++;
				echo ' <tr onclick="selectRow(this)">';
				echo '<td><input type="checkbox" value="'.$result['id'].'"  name="cadastro'.$contador.'"></td>';
				echo '	<td>Cadastro</td>';
				echo '	<td>'.$result['time'].'</td>';
				if ($result['in_out']==1)
					echo '	<td>Saída</td>';
				else
					echo '	<td>Entrada</td>';
					
				echo '</tr>';
				
			}
			$temp=$contador;
			$contador=0;																
			$query=mysql_query('SELECT id,time,in_out from Ptriagem where id_donator='.$_GET['id_donator'].'; ');
			while ($result = mysql_fetch_array($query)){
				$contador++;
				echo ' <tr onclick="selectRow(this)">';
				echo '<td><input type="checkbox" value="'.$result['id'].'"  name="ptriagem'.$contador.'"></td>';
				echo '	<td>Pré-Triagem</td>';
				echo '	<td>'.$result['time'].'</td>';
				if ($result['in_out']==1)
					echo '	<td>Saída</td>';
				else
					echo '	<td>Entrada</td>';
					
				echo '</tr>';
				
			}
			if ($contador>$temp) $temp=$contador;
			$contador=0;																
			$query=mysql_query('SELECT id,time,in_out from Triagem where id_donator='.$_GET['id_donator'].'; ');
			while ($result = mysql_fetch_array($query)){
				$contador++;
				echo ' <tr onclick="selectRow(this)">';
				echo '<td><input type="checkbox" value="'.$result['id'].'"  name="triagem'.$contador.'"></td>';
				echo '	<td>Triagem</td>';
				echo '	<td>'.$result['time'].'</td>';
				if ($result['in_out']==1)
					echo '	<td>Saída</td>';
				else
					echo '	<td>Entrada</td>';
					
				echo '</tr>';
				
			}
			if ($contador>$temp) $temp=$contador;
			$contador=0;																
			$query=mysql_query('SELECT id,time,in_out from Coleta where id_donator='.$_GET['id_donator'].'; ');
			while ($result = mysql_fetch_array($query)){
				$contador++;
				echo ' <tr onclick="selectRow(this)">';
				echo '<td><input type="checkbox" value="'.$result['id'].'"  name="coleta'.$contador.'"></td>';
				echo '	<td>Coleta</td>';
				echo '	<td>'.$result['time'].'</td>';
				if ($result['in_out']==1)
					echo '	<td>Saída</td>';
				else
					echo '	<td>Entrada</td>';
					
				echo '</tr>';
				
			}
			if ($contador>$temp) $temp=$contador;							
			}
		}
		echo '<input type="hidden" name="num_reg" value='.$temp.' >';
		echo '<input type="hidden" name="excluir" value=1 >';
		echo '<input type="hidden" name="id_donator" value="'.$_GET['id_donator'].'">';
		?>
		</tbody>
	</table>
	<table>
		<tr>	
			<td>
				<button id="confirmar" Onclick="confirmar()" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--raised mdl-button--colored">Excluir</button>
			</td>
			</form>
			<td>
				<a href="./index.php"><button  class="mdl-button mdl-js-button mdl-button--raised mdl-button--raised mdl-button--colored">Voltar</button></a>
			</td>
		</tr>
	</table>
	
</div>	
<script type="text/javascript">
function selectRow(row)
{
    var firstInput = row.getElementsByTagName('input')[0];
    firstInput.checked = !firstInput.checked;
}
</script>
</body>
</html>		
