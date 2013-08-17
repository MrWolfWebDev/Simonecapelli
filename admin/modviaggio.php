<?php
	session_start();
	if ($_SESSION['auth'] == 1):
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modifica/elimina</title>
</head>
<body>
	<?php
	include('../php/db_account.php');
	include('../php/db_connect.php');
	
	$query = "SELECT `IdViaggio`, `Titolo`, `Confermato` FROM `viaggi`";
	$result = mysql_query($query) or die(mysql_error());

?>
    <form action="modviaggio.php" method="post"> 
        <table>
			<?php
				while ($row = mysql_fetch_row($result)){
				  echo "<tr><td><input type=\"checkbox\" name=\"viaggio[]\" value=".$row[0];
				  if ($row[2] == 1) { echo " checked"; }
				  echo "></td><td>".$row[1]."</td><td><button type=\"submit\" name = \"modifica\" value=\"".$row[0]."\">Modifica</button></td></tr>";
				}
							
				mysql_close($connessione);
				
            ?>
        <input type="submit" name = "conferma" value="Conferma">
        </table>
	</form>
    
<?php
	if (!empty($_POST)){
		if (isset($_POST['conferma'])){
			include('../php/db_account.php');
			include('../php/db_connect.php');
			
			$query = "SELECT `IdViaggio`, `Titolo`, `Confermato` FROM `viaggi`";
			$result2 = mysql_query($query) or die(mysql_error());
		
			while($row2 = mysql_fetch_row($result2)){
				include_once('../php/db_account.php');
				include_once('../php/db_connect.php');
				$sql1 = "UPDATE `viaggi` SET `Confermato`= 0 WHERE `IdViaggio`=".$row2[0];
				mysql_query($sql1) or die(mysql_error());
			}
			
			foreach($_POST['viaggio'] as $id)
			{	
				include_once('../php/db_account.php');
				include_once('../php/db_connect.php');	
				$sql2 = "UPDATE `viaggi` SET `Confermato`= 1 WHERE `IdViaggio`=".$id;
				mysql_query($sql2) or die(mysql_error());
			}
			
			mysql_close($connessione);
			
			header("location:index.php");
		} else {
			$id = filter_var($_POST['modifica'], FILTER_SANITIZE_NUMBER_INT);
			
			header("location:modviaggio2.php?viaggio=$id");
		}
	}
?>
	
</body>
</html>

<?php
	else:
		header("location:login.php");
	endif;
	
?>