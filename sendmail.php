<?php

	$to = "avalenza89@gmail.com";
	$subject = "[Contatto da Sito]";
	$message = filter_var($_POST['emailContent'], FILTER_SANITIZE_SPECIAL_CHARS);
	$from = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$headers = "From: $from";
	
	
	mail($to,$subject,$message,$headers);
	
	header("location:index.php");

?>