<html>
<head>
	<link rel="stylesheet" href="./material.min.css">
	<link rel="stylesheet" href="./my-style.css">	
	<script src="./material.min.js"></script>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body bgcolor="#E0E4CC" >
		<br><br><br><br><br>
		<div id="mydiv_1">
			<?php
				$warn_scr=0;
				if($_GET['posto']==1){
					if (mysql_connect('localhost','root','')) {
						if (mysql_select_db('Cont_Tempo')) 
						{
				         	$query_search=mysql_query('SELECT * from Cadastro  WHERE id_donator = "'.$_GET['id_donator'].'" AND in_out = "'.$_GET['estado'].'";');
							if (mysql_num_rows($query_search)!=0)
								$warn_scr=1;					
						}
					}
				}
				if($_GET['posto']==2){
					if (mysql_connect('localhost','root','')) {
						if (mysql_select_db('Cont_Tempo')) 
						{				         																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																					
							$query_search=mysql_query('SELECT * from Ptriagem  WHERE id_donator = "'.$_GET['id_donator'].'" AND in_out = "'.$_GET['estado'].'";');
							if (mysql_num_rows($query_search)!=0)
								$warn_scr=2;
						}
					}
				}
				if($_GET['posto']==3){
					if (mysql_connect('localhost','root','')) {
						if (mysql_select_db('Cont_Tempo')) 
						{	
							$query_search=mysql_query('SELECT * from Triagem  WHERE id_donator = "'.$_GET['id_donator'].'" AND in_out = "'.$_GET['estado'].'";');
							if (mysql_num_rows($query_search)!=0)
								$warn_scr=3;
						}
					}
				}
				if($_GET['posto']==4){
					if (mysql_connect('localhost','root','')) {
						if (mysql_select_db('Cont_Tempo')) 
						{																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																			
							$query_search=mysql_query('SELECT * from Coleta  WHERE id_donator = "'.$_GET['id_donator'].'" AND in_out = "'.$_GET['estado'].'";');
							if (mysql_num_rows($query_search)!=0)
								$warn_scr=4;						
						}
					}
				}
				if ($warn_scr==0)
				{
					if($_GET['posto']==1){
						 if ($_GET['estado']==0){
							echo '<h4 align="center">O doador '.$_GET['id_donator'].' está ENTRANDO no CADASTRO?</h4><br>';
						}
						 if ($_GET['estado']==1)
							echo '<h4 align="center">O doador '.$_GET['id_donator'].' está SAINDO do CADASTRO?</h4><br>';	
					}
					if($_GET['posto']==2){
						 if ($_GET['estado']==0)
							echo '<h4 align="center">O doador '.$_GET['id_donator'].' está ENTRANDO na PRÉ-TRIAGEM?</h4><br>';
						 if ($_GET['estado']==1)
							echo '<h4 align="center">O doador '.$_GET['id_donator'].' está SAINDO da PRÉ-TRIAGEM?</h4><br>';	
					}
					if($_GET['posto']==3){
						 if ($_GET['estado']==0)
							echo '<h4 align="center">O doador '.$_GET['id_donator'].' está ENTRANDO na TRIAGEM?</h4><br>';
						 if ($_GET['estado']==1)
							echo '<h4 align="center">O doador '.$_GET['id_donator'].' está SAINDO da TRIAGEM?</h4><br>';	
					}
					if($_GET['posto']==4){
						 if ($_GET['estado']==0)
							echo '<h4 align="center">O doador '.$_GET['id_donator'].' está ENTRANDO na COLETA?</h4><br>';
						 if ($_GET['estado']==1)
							echo '<h4 align="center">O doador '.$_GET['id_donator'].' está SAINDO da COLETA?</h4><br>';	
					}
					echo '<a href="./index.php"> <button id="cancelar"  class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
							 Não 
						  </button>   </a> ';
					echo '<form	method="get" action="./confirm_action.php">';
					echo '<input type="hidden" name="posto" value="'.$_GET['posto'].'">';
					echo '<input type="hidden" name="estado" value="'.$_GET['estado'].'">';
					echo '<input type="hidden" name="id_donator" value="'.$_GET['id_donator'].'">';
					echo '<input type="hidden" name="confirm" value="">';
					echo '<button id="confirmar" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--raised mdl-button--colored">
						Sim';
					echo '</button>';
					echo '</form>';
					
				}else 
				{ 
					echo '<div align="center">
							<table id="example" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp ">
								<thead>
									<tr>
										<th class="mdl-data-table__cell--non-numeric">Processo</th>
										<th>Hora</th>
									</tr>
								</thead>
							<tbody>';
				    if (mysql_connect('localhost','root','')) {
						if (mysql_select_db('Cont_Tempo')) 
						{	
							if ($_GET['posto']==1){
								$query=@mysql_query('select time from Cadastro WHERE id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');	
								while ($result=@mysql_fetch_array($query))
								echo'<tr><td>Cadastro</td><td>'.$result['time'].'</td></tr>';
							}
							if ($_GET['posto']==2){
								$query=@mysql_query('select time from Ptriagem WHERE id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');	
								while ($result=@mysql_fetch_array($query))
								echo'<tr><td>Pré-triagem</td><td>'.$result['time'].'</td></tr>';
							}
							if ($_GET['posto']==3){
								$query=@mysql_query('select time from Triagem WHERE id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');	
								while ($result=@mysql_fetch_array($query))
								echo'<tr><td>Triagem</td><td>'.$result['time'].'</td></tr>';
							}
							if ($_GET['posto']==4){
								$query=@mysql_query('select time from Coleta WHERE id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');	
								while ($result=@mysql_fetch_array($query))
								echo'<tr><td>Coleta</td><td>'.$result['time'].'</td></tr>';
							}
						}
					}
				
					echo '</tbody></table></div>';				       																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																						
					if($warn_scr==1){
						 if ($_GET['estado']==0)
							echo '<h4 align="center">Já EXISTE um doador '.$_GET['id_donator'].' ENTRANDO no CADASTRO, deseja substituir?</h4><br>';
						 if ($_GET['estado']==1)
							echo '<h4 align="center">Já EXISTE um doador '.$_GET['id_donator'].' SAINDO do CADASTRO, deseja substituir?</h4><br>';	
					}
					if($warn_scr==2){
						 if ($_GET['estado']==0)
							echo '<h4 align="center">Já EXISTE um doador '.$_GET['id_donator'].' ENTRANDO na PRÉ-TRIAGEM, deseja substituir?</h4><br>';
						 if ($_GET['estado']==1)
							echo '<h4 align="center">Já EXISTE um doador '.$_GET['id_donator'].' SAINDO da PRÉ-TRIAGEM, deseja substituir?</h4><br>';	
					}
					if($warn_scr==3){
						 if ($_GET['estado']==0)
							echo '<h4 align="center">Já EXISTE um doador '.$_GET['id_donator'].' está ENTRANDO na TRIAGEM, deseja substituir?</h4><br>';
						 if ($_GET['estado']==1)
							echo '<h4 align="center">Já EXISTE um doador '.$_GET['id_donator'].' está SAINDO da TRIAGEM, deseja substituir?</h4><br>';	
					}
					if($warn_scr==4){
						 if ($_GET['estado']==0)
							echo '<h4 align="center">Já EXISTE um doador '.$_GET['id_donator'].' está ENTRANDO na COLETA, deseja substituir?</h4><br>';
						 if ($_GET['estado']==1)
							echo '<h4 align="center">Já EXISTE um doador '.$_GET['id_donator'].' está SAINDO da COLETA, deseja substituir?</h4><br>';	
					}
					echo '<a href="./index.php"> <button id="cancelar"  class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
							 Não 
						  </button>   </a> ';
					echo '<form	method="get" action="./confirm_action.php">';
					echo '<input type="hidden" name="posto" value="'.$_GET['posto'].'">';
					echo '<input type="hidden" name="estado" value="'.$_GET['estado'].'">';
					echo '<input type="hidden" name="id_donator" value="'.$_GET['id_donator'].'">';
					echo '<input type="hidden" name="confirm" value="ativar">';
					echo '<button id="confirmar" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--raised mdl-button--colored">
						Sim';
					echo '</button>';
					echo '</form>';					
				}?>
		<br><br><br>			
		</div>	
</body>
</html>		
