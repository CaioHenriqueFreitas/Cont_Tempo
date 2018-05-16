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
		<?php
			if ($_GET['confirm']==null){
				if($_GET['posto']==1){
					if (mysql_connect('localhost','root','')) {
						if (mysql_select_db('Cont_Tempo')) 
						{	
							$report_file= fopen(".\\data\\report.txt","a+");
							date_default_timezone_set('America/Sao_Paulo');
							$date = date('H:i:s', time());
							if ($_GET['estado']==0)
								$text="0;".$_GET['id_donator'].";".$date.";\r\n";
							else
								$text="1;".$_GET['id_donator'].";".$date.";\r\n";
							fwrite($report_file, $text,strlen($text));
							$query=mysql_query('INSERT into Cadastro (id_donator,time,in_out) VALUES ("'.$_GET['id_donator'].'",curtime(),"'.$_GET['estado'].'");');								
						}
					}
				}
				if($_GET['posto']==2){
					if (mysql_connect('localhost','root','')) {
						if (mysql_select_db('Cont_Tempo')) 
						{				 
							$report_file= fopen(".\\data\\report.txt","a+");
							date_default_timezone_set('America/Sao_Paulo');
							$date = date('H:i:s', time());
							if ($_GET['estado']==0)
								$text="2;".$_GET['id_donator'].";".$date.";\r\n";
							else
								$text="3;".$_GET['id_donator'].";".$date.";\r\n";
							fwrite($report_file, $text,strlen($text));
							fclose($report_file);
							$query=mysql_query('INSERT into Ptriagem (id_donator,time,in_out) VALUES ("'.$_GET['id_donator'].'",curtime(),"'.$_GET['estado'].'");');								
						}
					}
				}
				if($_GET['posto']==3){
					if (mysql_connect('localhost','root','')) {
						if (mysql_select_db('Cont_Tempo')) 
						{	
							$report_file= fopen(".\\data\\report.txt","a+");
							date_default_timezone_set('America/Sao_Paulo');
							$date = date('H:i:s', time());
							if ($_GET['estado']==0)
								$text="4;".$_GET['id_donator'].";".$date.";\r\n";
							else
								$text="5;".$_GET['id_donator'].";".$date.";\r\n";
							fwrite($report_file, $text,strlen($text));
							fclose($report_file);
							$query=mysql_query('INSERT into Triagem (id_donator,time,in_out) VALUES ("'.$_GET['id_donator'].'",curtime(),"'.$_GET['estado'].'");');								
						}
					}
				}
				if($_GET['posto']==4){
					if (mysql_connect('localhost','root','')) {
						if (mysql_select_db('Cont_Tempo')) 
						{
							$report_file= fopen(".\\data\\report.txt","a+");
							date_default_timezone_set('America/Sao_Paulo');
							$date = date('H:i:s', time());
							if ($_GET['estado']==0)
								$text="6;".$_GET['id_donator'].";".$date.";\r\n";
							else
								$text="7;".$_GET['id_donator'].";".$date.";\r\n";
							fwrite($report_file, $text,strlen($text));
							fclose($report_file);
							$query=mysql_query('INSERT into Coleta (id_donator,time,in_out) VALUES ("'.$_GET['id_donator'].'",curtime(),"'.$_GET['estado'].'");');								
						}
					}
				}	
			}else{
					if($_GET['posto']==1){
						if (mysql_connect('localhost','root','')) {
							if (mysql_select_db('Cont_Tempo')) 
							{	
								$query_subs=mysql_query('SELECT id_donator,time,in_out from Cadastro where id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');		
								$result=mysql_fetch_array($query_subs);
								date_default_timezone_set('America/Sao_Paulo');
								$date = date('H:i:s', time());
								if ($result['in_out']==0)
								{	
									$delete_line="0;".$result['id_donator'].";".$result['time'].";";
									$subs = "0;".$_GET['id_donator'].";".$date.";"; //deixe em branco para simplesmente apagar a linha 
								}else{
									$delete_line="1;".$result['id_donator'].";".$result['time'].";";
									$subs = "1;".$_GET['id_donator'].";".$date.";"; //deixe em branco para simplesmente apagar a linha 
								}
								$data = file_get_contents(".\\data\\report.txt"); // pega o conteúdo do arquivo e carrega-o em uma variável 
								$new_data = str_replace($delete_line,$subs,$data); // cria um novo conteúdo 
								$load = fopen(".\\data\\report.txt", "w"); // abre o arquivo para escrita 
								fwrite($load, $new_data);  
								fclose($load); // fecha o arquivo 
								mysql_query('UPDATE Cadastro set time=curtime() where id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');								
							}
						}
					}
					if($_GET['posto']==2){
						if (mysql_connect('localhost','root','')) {
							if (mysql_select_db('Cont_Tempo')) 
							{
								$query_subs=mysql_query('SELECT id_donator,time,in_out from ptriagem where id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');		
								$result=mysql_fetch_array($query_subs);
								date_default_timezone_set('America/Sao_Paulo');
								$date = date('H:i:s', time());
								if ($result['in_out']==0)
								{	
									$delete_line="2;".$result['id_donator'].";".$result['time'].";";
									$subs = "2;".$_GET['id_donator'].";".$date.";"; 
								}else{
									$delete_line="3;".$result['id_donator'].";".$result['time'].";";
									$subs = "3;".$_GET['id_donator'].";".$date.";"; 
								}
								$data = file_get_contents(".\\data\\report.txt");  
								$new_data = str_replace($delete_line,$subs,$data);  
								$load = fopen(".\\data\\report.txt", "w");  
								fwrite($load, $new_data);  
								fclose($load); 
								mysql_query('UPDATE Ptriagem set time=curtime() where id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');
							}
						}
					}
					if($_GET['posto']==3){
						if (mysql_connect('localhost','root','')) {
							if (mysql_select_db('Cont_Tempo')) 
							{	
								$query_subs=mysql_query('SELECT id_donator,time,in_out from triagem where id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');		
								$result=mysql_fetch_array($query_subs);
								date_default_timezone_set('America/Sao_Paulo');
								$date = date('H:i:s', time());
								if ($result['in_out']==0)
								{	
									$delete_line="4;".$result['id_donator'].";".$result['time'].";";
									$subs = "4;".$_GET['id_donator'].";".$date.";"; 
								}else{
									$delete_line="5;".$result['id_donator'].";".$result['time'].";";
									$subs = "5;".$_GET['id_donator'].";".$date.";"; 
								}
								$data = file_get_contents(".\\data\\report.txt");  
								$new_data = str_replace($delete_line,$subs,$data);  
								$load = fopen(".\\data\\report.txt", "w");  
								fwrite($load, $new_data);  
								fclose($load);
								mysql_query('UPDATE Triagem set time=curtime() where id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');
							}
						}
					}
					if($_GET['posto']==4){
						if (mysql_connect('localhost','root','')) {
							if (mysql_select_db('Cont_Tempo')) 
							{
								$query_subs=mysql_query('SELECT id_donator,time,in_out from coleta where id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');		
								$result=mysql_fetch_array($query_subs);
								date_default_timezone_set('America/Sao_Paulo');
								$date = date('H:i:s', time());
								if ($result['in_out']==0)
								{	
									$delete_line="6;".$result['id_donator'].";".$result['time'].";";
									$subs = "6;".$_GET['id_donator'].";".$date.";"; 
								}else{
									$delete_line="7;".$result['id_donator'].";".$result['time'].";";
									$subs = "7;".$_GET['id_donator'].";".$date.";"; 
								}
								$data = file_get_contents(".\\data\\report.txt");  
								$new_data = str_replace($delete_line,$subs,$data);  
								$load = fopen(".\\data\\report.txt", "w");  
								fwrite($load, $new_data);  
								fclose($load);
								mysql_query('UPDATE Coleta set time=curtime() where id_donator='.$_GET['id_donator'].' and in_out='.$_GET['estado'].';');						
							}
						}
					}	
				
			}
			echo '<meta http-equiv="refresh" content="0; url=./index.php">';	
		?>
		
</body>
</html>		
