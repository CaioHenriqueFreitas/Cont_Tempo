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
<br>
<div id="mydiv_1" align="center">
<body bgcolor="#E0E4CC" >
	<br><br>
	<table id="example" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp ">
		<thead>
			<tr>
				<th class="mdl-data-table__cell--non-numeric">Processo</th>
				<th>Hora</th>
			</tr>
		</thead>
	<tbody>
	<?php if (mysql_connect('localhost','root','')) {
		if (mysql_select_db('Cont_Tempo')) 
		{
				$contador=1;
				while ($contador<=$_GET['num_reg']){
				$query=@mysql_query('select time from Cadastro WHERE id='.$_GET['cadastro'.$contador].';');	
				while ($result=@mysql_fetch_array($query))
				echo'<tr><td>Cadastro</td><td>'.$result['time'].'</td></tr>';
				$query=@mysql_query('select time from Ptriagem WHERE id='.$_GET['ptriagem'.$contador].';');	
				while ($result=@mysql_fetch_array($query))
				echo'<tr><td>Pré-triagem</td><td>'.$result['time'].'</td></tr>';
				$query=@mysql_query('select time from Triagem WHERE id='.$_GET['triagem'.$contador].';');	
				while ($result=@mysql_fetch_array($query))
				echo'<tr><td>Triagem</td><td>'.$result['time'].'</td></tr>';
				$query=@mysql_query('select time from Coleta WHERE id='.$_GET['coleta'.$contador].';');	
				while ($result=@mysql_fetch_array($query))
				echo'<tr><td>Coleta</td><td>'.$result['time'].'</td></tr>';
				$contador++;
				}
		}
	}?>
	</tbody></table>
	<?php
	if (mysql_connect('localhost','root','')) {
		if (mysql_select_db('Cont_Tempo')) 
		{
			if (@$_GET['confirmar']!=null){
				$contador=1;
				while ($contador<=$_GET['num_reg']){
					$query_subs=@mysql_query('SELECT id_donator,time,in_out from cadastro where id='.$_GET['cadastro'.$contador].';');		
					$result=mysql_fetch_array($query_subs);
					date_default_timezone_set('America/Sao_Paulo');
					$date = date('H:i:s', time());
					if ($result['in_out']==0)
					{	
						$delete_line="0;".$result['id_donator'].";".$result['time'].";";
						$subs = ""; 
					}else{
						$delete_line="1;".$result['id_donator'].";".$result['time'].";";
						$subs = ""; 
					}
					$data = file_get_contents(".\\data\\report.txt");  
					$new_data = str_replace($delete_line,$subs,$data);  
					$load = fopen(".\\data\\report.txt", "w");  
					fwrite($load, $new_data);  
					fclose($load);						
					$query=@mysql_query('DELETE from cadastro WHERE id='.$_GET['cadastro'.$contador].';');
					$query_subs=@mysql_query('SELECT id_donator,time,in_out from ptriagem where id='.$_GET['ptriagem'.$contador].';');		
					$result=mysql_fetch_array($query_subs);
					date_default_timezone_set('America/Sao_Paulo');
					$date = date('H:i:s', time());
					if ($result['in_out']==0)
					{	
						$delete_line="2;".$result['id_donator'].";".$result['time'].";";
						$subs = ""; 
					}else{
						$delete_line="3;".$result['id_donator'].";".$result['time'].";";
						$subs = ""; 
					}
					$data = file_get_contents(".\\data\\report.txt");  
					$new_data = str_replace($delete_line,$subs,$data);  
					$load = fopen(".\\data\\report.txt", "w");  
					fwrite($load, $new_data);  
					fclose($load);
					$query=@mysql_query('DELETE from Ptriagem WHERE id='.$_GET['ptriagem'.$contador].';');
					$query_subs=@mysql_query('SELECT id_donator,time,in_out from triagem where id='.$_GET['triagem'.$contador].';');		
					$result=mysql_fetch_array($query_subs);
					date_default_timezone_set('America/Sao_Paulo');
					$date = date('H:i:s', time());
					if ($result['in_out']==0)
					{	
						$delete_line="4;".$result['id_donator'].";".$result['time'].";";
						$subs = ""; 
					}else{
						$delete_line="5;".$result['id_donator'].";".$result['time'].";";
						$subs = ""; 
					}
					$data = file_get_contents(".\\data\\report.txt");  
					$new_data = str_replace($delete_line,$subs,$data);  
					$load = fopen(".\\data\\report.txt", "w");  
					fwrite($load, $new_data);  
					fclose($load);
					$query=@mysql_query('DELETE from Triagem WHERE id='.$_GET['triagem'.$contador].';');
					$query_subs=@mysql_query('SELECT id_donator,time,in_out from coleta where id='.$_GET['coleta'.$contador].';');		
					$result=mysql_fetch_array($query_subs);
					date_default_timezone_set('America/Sao_Paulo');
					$date = date('H:i:s', time());
					if ($result['in_out']==0)
					{	
						$delete_line="6;".$result['id_donator'].";".$result['time'].";";
						$subs = ""; 
					}else{
						$delete_line="7;".$result['id_donator'].";".$result['time'].";";
						$subs = ""; 
					}
					$data = file_get_contents(".\\data\\report.txt");  
					$new_data = str_replace($delete_line,$subs,$data);  
					$load = fopen(".\\data\\report.txt", "w");  
					fwrite($load, $new_data);  
					fclose($load);
					$query=@mysql_query('DELETE from Coleta WHERE id='.$_GET['coleta'.$contador].';');
					$contador++;
				}
			
			echo '<meta http-equiv="refresh" content="0; url=./index.php">';	
			}
		}
	}		
				echo '<h4>Deseja realmente EXCLUIR esses registros?</h4>';
				echo '<a href="./excluir.php?id_donator='.$_GET['id_donator'].'"> <button id="cancelar"  class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
						 Não 
					  </button>   </a> ';
				echo '<form	method="get" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">';
				$contador=1;
				while ($contador<=$_GET['num_reg']){
				echo '<input type="hidden" name="cadastro'.$contador.'" value="'.@$_GET['cadastro'.$contador].'")>';
				echo '<input type="hidden" name="ptriagem'.$contador.'" value="'.@$_GET['ptriagem'.$contador].'")>';
				echo '<input type="hidden" name="triagem'.$contador.'" value="'.@$_GET['triagem'.$contador].'")>';
				echo '<input type="hidden" name="coleta'.$contador.'" value="'.@$_GET['coleta'.$contador].'")>';
				$contador++;}
				echo '<input type="hidden" name="num_reg" value="'.$_GET['num_reg'].'">';
				echo '<input type="hidden" name="id_donator" value="'.$_GET['id_donator'].'">';
				?>
				<input type="hidden" name="confirmar" value='ativar'>
				<button id="confirmar" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--raised mdl-button--colored">
					Sim
				</button>
				</form>
				<br><br><br><br>
		</div>	
</body>
</html>		
