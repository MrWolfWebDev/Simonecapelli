<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>

    <?php
    include('../php/db_account.php');
    include('../php/db_connect.php');

    $query = "SELECT `IdImage`, `ImageTitle` FROM `images`";
    $result = mysql_query($query) or die(mysql_error());
    ?>
    <form action="delimmagine.php" method="post">
        <table>
            <?php
            while ($row = mysql_fetch_row($result)) {
                echo "<tr><td><input type=\"checkbox\" name=\"image[]\" value=" . $row[0] . "></td><td>" . $row[1] . "</td></tr>";
            }

            mysql_close($connessione);
            ?>
            <input type="submit" value="Elimina">
        </table>
    </form>

    <?php
    if (!empty($_POST)) {
        foreach ($_POST['image'] as $delete) {
            include('../php/db_account.php');
            include('../php/db_connect.php');

            $sql = "SELECT `ImagePath` FROM `images` WHERE `IdImage`=$delete";
            $result = mysql_query($sql) or die(mysql_error());
            $delImage = mysql_fetch_assoc($result);
            unlink($delImage["ImagePath"]);
            unlink(substr($delImage["ImagePath"], 0, -4) . "-color.jpg");

            $query = "DELETE FROM `images` WHERE `IdImage`=$delete";
            mysql_query($query) or die(mysql_error());
        }

        mysql_close($connessione);

        header("location:index.php");
    }
    ?>

    <?php
else:
    header("location:login.php");
endif;
?>