<?php

session_start();
if ($_SESSION['auth'] == 1):
    ?>

    <?php

    foreach ($_POST['news'] as $delete) {
        include('../php/db_account.php');
        include('../php/db_connect.php');

        $query = "DELETE FROM `news` WHERE `IdNews`=" . $delete;
        mysql_query($query) or die(mysql_error());

        unlink("../pdf/$id.pdf");
    }

    mysql_close($connessione);

    header("location:index.php")
    ?>

    <?php

else:
    header("location:login.php");
endif;
?>