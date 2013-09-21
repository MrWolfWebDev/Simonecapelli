<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Aggiungi immagini extra</title>
        </head>

        <body>
            <form action="addimmagine.php" method="post" enctype='multipart/form-data'>
                <table align="center">
                    <tr><td colspan="2">Inserisci titolo</td><td><input name="title" type="text"></td></tr>
                    <tr><td colspan="2">Inserisci una immagine</td><td><input id="file" name="files" type="file"></td></tr>
                    <tr><td colspan="4"><button type="submit" name = "submit">Conferma</button></td></tr>
                    <tr><td colspan="4"></td></tr>
                </table>
            </form>
        </body>
    </html>

    <?php
    //Dati accesso db
    include('../php/db_account.php');
    //effettuo l'inserimento sul database
    include('../php/db_connect.php');
    $time = time();

    if (isset($_POST['submit'])) {
        if (isset($_FILES['files']) && is_uploaded_file($_FILES['files']['tmp_name'])) {
            $nome_immagine = $_FILES['files']['tmp_name'];
            //valore di foto_id dopo l'inserimento
            $percorso = "../img/gallery/";

            //cartella sul server dove verrà spostata la foto
            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $nuovo_nome = $percorso . $time . '.jpg';
            $nuovo_nome_color = substr($nuovo_nome, 0, -4) . "-color.jpg";

            $inviato = file_exists($nome_immagine);
            //verifica se il file è stato caricato sul server


            if ($inviato) {
                // Upload immagine a colori
                move_uploaded_file($nome_immagine, $nuovo_nome_color);

                $img = imagecreatefromjpeg($nuovo_nome_color);
                imagefilter($img, IMG_FILTER_GRAYSCALE);
                imagejpeg($img, $nuovo_nome);
                // TODO: Da finire (inserire anche immagine a colori)
                // sposto l'immagine nella cartella

                $sql = "INSERT INTO `images`(`ImageTitle`, `ImagePath`, `InsDate`) VALUES ('$title','$nuovo_nome',CURRENT_DATE())";
                mysql_query($sql) or die(mysql_error());
            }
            header("Location: ruotaimmagine.php");
        } else {
            echo "Compila tutti i campi";
        }
    }
    ?>


    <?php
else:
    header("location:login.php");
endif;
?>