<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Aggiungi Nuovo Video</title>
            <!-- jQuery & jQueryUI -->
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

            <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" />
        </head>

        <body>
            <form action="addvideo.php" method="post">
                <table align= "center">
                    <tr><td>Titolo</td><td colspan="3"><input type="text" name="titolo" size="75"/></td></tr>
                    <tr><td>ID Video Youtube<br/>(quello dopo watch?v=)</td><td colspan="3"><input type="text" name="id" size="75"/></td></tr>
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
                    if (empty($_POST[$key]))
                        $empty = true;
                }

                if (!$empty) {

                    $titolo = filter_var($_POST['titolo'], FILTER_SANITIZE_STRING);
                    $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

                    $sql = "INSERT INTO `video`(`IdVideo`, `VideoTitle`, `InsDate`) VALUES ('$id','$titolo',CURRENT_DATE())";
                    mysql_query($sql) or die(mysql_error());

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