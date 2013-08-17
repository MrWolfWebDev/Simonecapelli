<?php

	@$connessione = mysql_connect($dominio,$user,$password) or die("Connessiona al DB fallita");
	mysql_select_db($db)or die("Impossibile selezionare il database.");
	
?>