<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>

    <?php
    include('../php/db_account.php');
    include('../php/db_connect.php');

    $query = "SELECT * FROM `news`";
    $result = mysql_query($query) or die(mysql_error());
    ?>
    <form action="killnews.php" method="post">
        <table align="center">
            <?php
            while ($row = mysql_fetch_row($result)) {
                echo "<tr><td><input type=\"checkbox\" name=\"news[]\" value=" . $row[0] . "></td><td>" . $row[2] . "</td></tr>";
            }

            mysql_close($connessione);
            ?>
            <tr><td><input type="submit" value="Elimina"></td></tr>
        </table>
    </form>

    <?php
else:
    header("location:login.php");
endif;
?>