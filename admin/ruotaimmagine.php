<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>

    <?php
    //Dati accesso db
    include('../php/db_account.php');
//effettuo l'inserimento sul database
    include('../php/db_connect.php');
    $query = "SELECT `IdImage`, `ImagePath` FROM `images` ORDER BY `IdImage` DESC";

    $result = mysql_query($query) or die(mysql_error());
    $lastRow = mysql_fetch_assoc($result);
    $lastPath = $lastRow['ImagePath'];
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Aggiungi immagini extra</title>
        </head>

        <body>
            <form action="ruotaimmagine.php" method="post">
                <table align="center">
                    <tr><td colspan="2">Immagine inserita</td><td><img src=<?php echo "'$lastPath'"; ?> /></td></tr>
                    <tr><td colspan="2"><button type="submit" name = "acw">Antiorario</button></td><td><button type="submit" name = "cw">Orario</button></td></tr>
                    <tr><td colspan="4"><button type="submit" name = "submit">Conferma</button></td></tr>
                    <tr><td colspan="4"></td></tr>
                </table>
            </form>
        </body>
    </html>

    <?php
    if (isset($_POST['submit'])) {
        header("Location:index.php");
    }
    if (isset($_POST['acw']) || isset($_POST['cw'])) {
        if (isset($_POST['acw'])) {
            $degrees = 90;
        }
        if (isset($_POST['cw'])) {
            $degrees = 270;
        }

        $source = imagecreatefromjpeg($lastPath);
        $rotate = imagerotate($source, $degrees, 0);
        imagejpeg($rotate, $lastPath);

// Rotate color image
        $lastPathColor = substr($lastPath, 0, -4) . "-color.jpg";

        $source = imagecreatefromjpeg($lastPathColor);
        $rotate = imagerotate($source, $degrees, 0);
        imagejpeg($rotate, $lastPathColor);

// Free the memory
        imagedestroy($source);
        imagedestroy($rotate);

        header("Location:ruotaimmagine.php");
    }
    
    ?>

    <?php
else:
    header("location:login.php");
endif;
?>