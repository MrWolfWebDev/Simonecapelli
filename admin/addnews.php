<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Inserire News</title>
        </head>

        <body>
            <form id = "newsBox" method = "post" action="addnews.php" enctype='multipart/form-data'>
                <table style="width: 300px;" align="center">
                    <tr><td><p><br />Inserisci il contenuto della tua &quot;news&quot;</p></td></tr>
                    <tr><td><input style="width:100%;" type="text" name="newsTitle"/></td></tr>
                    <tr><td><textarea style="width:100%; height: 200px; resize:vertical" id = "newsContent" name = "newsContent"></textarea></td></tr>
                    <tr><td><br/></td></tr>
                    <tr><td>Seleziona un file .pdf da inserire</td></tr>
                    <tr><td><input type="file" name="pdf"/></td></tr>
                    <tr><td><br/></td></tr>
                    <tr><td align="right"><input type = "submit" value = "Inserisci" id="insert"/><br /></td></tr>

                    <tr><td><br /></td></tr>

                </table>
            </form>

            <?php
            require_once ('../php/db_account.php');
            require_once ('../php/db_connect.php');



            if (isset($_POST["newsTitle"]) && isset($_POST["newsContent"])) {
                $newsTitle = filter_var($_POST["newsTitle"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $newsContent = filter_var($_POST["newsContent"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $query = "INSERT INTO  `news` (`InsDate`, `NewsTitle`, `NewsText`) VALUES (CURRENT_DATE() ,  '$newsTitle',  '$newsContent')";
                $result = mysql_query($query) or die(mysql_error());
                if ($result) {
                    if (isset($_FILES['files']) && is_uploaded_file($_FILES['files']['tmp_name'])) {
                        $nome_pdf = $_FILES['files']['tmp_name'];
                        $percorso = "../pdf/";

                        $query2 = "SELECT `IdNews` FROM `news` ORDER BY `IdNews` DESC";
                        $result2 = mysql_query($query2) or die(mysql_error());
                        $row2 = mysql_fetch_array($result2);
                        $id = $row2[0];

                        $nuovo_nome_pdf = $percorso . $id . ".pdf";

                        move_uploaded_file($nuovo_nome_pdf, $nome_pdf);

                        header("location:index.php");
                    }
                }
            }

            mysql_close($connessione);
            ?>
        </body>
    </html>

    <?php
else:
    header("location:login.php");
endif;
?>