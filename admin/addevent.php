<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Aggiungi Nuovo Evento</title>
            <!-- jQuery & jQueryUI -->
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

            <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" />

            <!-- DatePicker -->
            <script type="text/javascript">
                $( document ).ready( function() {
                    $( ".datepicker" ).datepicker( {
                        dateFormat: "yy-mm-dd",
                        minDate: 0
                    } );
                } );
            </script>
        </head>

        <body>
            <form action="addevent.php" method="post" enctype='multipart/form-data'>
                <table align= "center">
                    <tr><td>Titolo</td><td colspan="3"><input type="text" name="titolo" size="75"/></td></tr>
                    <tr><td>Data</td><td><input name="data" type="text" class="datepicker" readonly/></td></tr>
                    <!-- END elenco -->
                    <tr><td>Luogo</td><td colspan="3"><input type="text" name="luogo" size="75"/></td></tr>
                    <tr><td>Descrizione</td></tr>
                    <tr><td></td><td colspan="3"><textarea style="resize:none;" name="descrizione" rows="10" cols="57"></textarea></td></tr>
                    <tr><td>Link Evento</td><td colspan="3"><input type="text" name="link" size="75"/></td></tr>
                    <tr><td colspan="4" align="center"><input type="submit" value="Conferma"/></td ></tr>
                </table>
            </form>

            <?php
            //Dati accesso db
            include('../php/db_account.php');
            //effettuo l'inserimento sul database
            include('../php/db_connect.php');

            if (isset($_POST) && !empty($_POST)) {
                $empty = false;
                foreach (array_keys($_POST) as $key) {
                    if (empty($_POST[$key]) && $key != 'link') {
                        $empty = true;
                    }
                }

                if (!$empty) {

                    $titolo = filter_var($_POST['titolo'], FILTER_SANITIZE_STRING);
                    $data = filter_var($_POST['data'], FILTER_SANITIZE_STRING);
                    $luogo = filter_var($_POST['luogo'], FILTER_SANITIZE_STRING);
                    $descrizione = filter_var($_POST['descrizione'], FILTER_SANITIZE_STRING);

                    if (empty($_POST['link'])) {
                        $link = '-';
                    } else {
                        $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);
                    }
                    if (strpos($link, 'http://') === false && $link != '#') {
                        $link = 'http://' . $link;
                    }

                    $insertGara = "INSERT INTO `eventi`(`EventDate`, `EventTitle`, `EventDesc`, `EventLink`, `EventPlace`) VALUES ('$data', '$titolo', '$descrizione', '$link', '$luogo')";

                    mysql_query($insertGara) or die(mysql_error());

                    header("location:index.php");
                } else {
                    echo "Devi inserire tutti i campi";
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