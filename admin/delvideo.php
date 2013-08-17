<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>

    <?php
    include('../php/db_account.php');
    include('../php/db_connect.php');

    $query = "SELECT `IdVideo`, `VideoTitle` FROM `video`";
    $result = mysql_query($query) or die(mysql_error());
    ?>
    <form action="delvideo.php" method="post">
        <table>
            <?php
            while ($row = mysql_fetch_row($result)) {
                echo "<tr><td><input type=\"checkbox\" name=\"gara[]\" value=" . $row[0] . "></td><td>" . $row[1] . "</td></tr>";
            }

            mysql_close($connessione);
            ?>
            <input type="submit" value="Elimina">
        </table>
    </form>

    <?php
    if (!empty($_POST)) {
        foreach ($_POST['gara'] as $delete) {
            include('../php/db_account.php');
            include('../php/db_connect.php');

            $query = "DELETE FROM `video` WHERE `IdVideo`='$delete'";
            $result = mysql_query($query) or die(mysql_error());
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