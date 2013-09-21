<?php
	session_start();
	if ($_SESSION['auth'] == 1):
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aggiungi Nuovo Viaggio</title>
	<!-- jQuery & jQueryUI -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" />
    
	<!-- DatePicker -->
    <script type="text/javascript">
		$(document).ready(function() {
            $(".datepicker").datepicker({
				dateFormat: "yy-mm-dd",
				minDate: 0 
			});
        });
	</script>
</head>

<body>
	<?php
		include('../php/db_account.php');
		include('../php/db_connect.php');
		
		$id = filter_var($_GET['viaggio'], FILTER_SANITIZE_NUMBER_INT);
		
		$query = "SELECT * FROM `viaggi` WHERE `IdViaggio` = ". $id;
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_row($result);
	?>
    
    <form action="modviaggio2.php?viaggio=<?php echo $id ?>" method="post" enctype='multipart/form-data'>
        <table align= "center">
            <tr><td>Titolo</td><td colspan="3"><input type="text" name="titolo" size="75" value=<?php echo "\"".$row[5]."\"";?>/></td></tr>
            <tr><td>Dal</td><td><input name="partenza" type="text" class="datepicker" value=<?php echo "\"".$row[12]."\"";?> readonly/></td><td><div style="float:left; margin-left: 30px;">Al</div><div style="float:right"><input name="arrivo" type="text" class="datepicker"  value=<?php echo "\"".$row[13]."\"";?> readonly/></div></td></tr>
            <!-- END elenco -->
            <tr><td>Destinazioni</td><td colspan="3"><input type="text" name="destinazione" size="75" value=<?php echo "\"".$row[11]."\"";?>/></td></tr>
            <tr><td>Posti</td><td><input type="text" name="posti" size="8" value=<?php echo "\"".$row[10]."\"";?>/></td></tr>
            <tr><td>Prezzo</td><td><input type="text" name="prezzo" size="8" value=<?php echo "\"".$row[6]."\"";?>/></td><td>Note Prezzo<input type="text" name="noteprezzo" size="35" value=<?php echo "\"".$row[7]."\"";?>/></td></tr>
            <tr><td>Descrizione</td></tr>
            <tr><td></td><td colspan="3"><textarea style="resize:none;" name="descrizione" rows="10" cols="57"><?php echo $row[4];?></textarea></td></tr>
            <tr><td>Immagine Copertina</td><td><?php echo "<img width='100' height='80' src='../img/cover/$id.jpg'"; ?></td><td><input type="file" name = "files"/></td></tr>
            <tr><td>Selezionare le categorie</td></tr>
            <tr><td></td><td><input type="checkbox" name="low-cost" value = "1" <?php if($row[1]==1) echo "checked";?>/>Low cost</td>
            <td><div style="float:left"><input type="checkbox" name="gruppo" value = "1" <?php if($row[2]==1) echo "checked";?>/>Viaggi di Gruppo</div><div style="float:right"><input type="checkbox" name="rilievo" value = "1" <?php if($row[3]==1) echo "checked";?>/>Viaggi in rilievo</div></td>
            <td></td>
            </tr>
            <tr><td>Note Personali</td></tr>
            <tr><td></td><td colspan="3"><textarea style="resize:none;" name="note" rows="10" cols="57"><?php echo $row[8];?></textarea></td></tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Conferma"/></td ></tr>
        </table>
	</form>
    
    <?php
    	//Dati accesso db
		include('../php/db_account.php');
		//effettuo l'inserimento sul database
		include('../php/db_connect.php');
		
		$id = filter_var($_GET['viaggio'], FILTER_SANITIZE_NUMBER_INT);
		
		if(isset($_POST) && !empty($_POST)){
			$empty = false;
			foreach (array_keys($_POST) as $key)
			{
				if (empty($_POST[$key])) { $empty = true; }
			}
			
			if (!$empty){
				
				// Unchecked checkbox are not set in $_POST
				// Even if the values aren't set, we want to insert a value
				
				$lowcost = (isset($_POST['low-cost'])) ? 1 : 0;
				$gruppo = (isset($_POST['gruppo'])) ? 1 : 0;
				$rilievo = (isset($_POST['rilievo'])) ? 1 : 0;
				
				$descrizione = filter_var($_POST['descrizione'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$titolo = filter_var($_POST['titolo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$prezzo = filter_var(str_replace(",", ".", $_POST['prezzo']) , FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
				$noteprezzo = filter_var($_POST['noteprezzo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$note = filter_var($_POST['note'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$posti = filter_var($_POST['posti'], FILTER_SANITIZE_NUMBER_INT);
				$destinazione = filter_var($_POST['destinazione'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$partenza = filter_var($_POST['partenza'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$arrivo = filter_var($_POST['arrivo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				
				
				// NOTE: if $partenza = $arrivo, $giorni must be 1, hence the +1 at the end
				$giorni = floor((strtotime($arrivo) - strtotime($partenza))/86400) + 1;
			
			
				$nome_immagine = $_FILES['files']['tmp_name'];
				
				$insertViaggio = "UPDATE `viaggi` SET `LowCost`=$lowcost,`DiGruppo`=$gruppo,`InRilievo`=$rilievo,`Descrizione`='$descrizione',`Titolo`='$titolo',`Prezzo`= $prezzo, `NotePrezzo`='$noteprezzo',`Note`='$note',`Posti`= $posti ,`Destinazione`='$destinazione',`DataPartenza`='$partenza',`DataArrivo`='$arrivo' WHERE `IdViaggio`= $id";
				
				mysql_query($insertViaggio);
				
				//valore di foto_id dopo l'inserimento
				if (!empty($_FILES['files']['tmp_name'])){
					$percorso = "../img/cover/";
					//cartella sul server dove verrà spostata la foto
					
					$nuovo_nome = $percorso.$id.".jpg";
					
					$inviato=file_exists($nome_immagine);
					//verifica se il file è stato caricato sul server
					//header("Location:modgiorni.php?viaggi=$id");
					
					if ($inviato) {
						// sposto l'immagine nella cartella 
						move_uploaded_file($nome_immagine,$nuovo_nome);
					} else {
						echo "<BR> Errore";
					}
				}
				
				header("location:modgiorni.php?viaggio=$id");
			} else { echo "Devi inserire tutti i campi"; }
		}
 	?>
</body>
</html>

<?php
	else:
		header("location:login.php");
	endif;
	
?>