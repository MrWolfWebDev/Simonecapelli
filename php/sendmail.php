<?php

	$to = "simone-vtr@libero.it";
	$subject = "[Richiesta informazioni]";
	$message = filter_var($_POST['emailContent'], FILTER_SANITIZE_SPECIAL_CHARS);
	$from = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$headers = "From: $from";
	
	
	mail($to,$subject,$message,$headers);
	echo "Mail inviata";

?>