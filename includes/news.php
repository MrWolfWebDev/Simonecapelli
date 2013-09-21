<img id="prevnws" src="img/f_off_sx.png"/>
<div style="top:60%; width:60%; height:100%; background:none;">
    <?php
    require_once('../php/db_account.php');
    require_once('../php/db_connect.php');
    require_once('../php/date.php');


//Gara

    $sql = "SELECT `IdNews`, `InsDate`, `NewsTitle`, `NewsText` FROM `news` ORDER BY `InsDate` DESC";
    $result = mysql_query($sql) or die(mysql_error());
    ?>



    <div style="height:40%; width:100% !important;"  id = "gallerynews" class="cycle-slideshow"
         data-cycle-fx="carousel"
         data-cycle-timeout="0"
         data-cycle-carousel-visible=3
         data-allow-wrap=false
         data-cycle-slides="> div"
         data-cycle-next="#nextatt"
         data-cycle-prev="#prevatt">


        <?php
        while ($gara = mysql_fetch_assoc($result)) {
            echo '<div class="casellanews">
            <b>', data_it($gara["InsDate"]), '</b>
            <br>
            <br><a target="_blank" href="pdf/', $gara["IdNews"], '.pdf"><b>', $gara["NewsTitle"], '</b></a>
            <br>
            <br>
            <p style="white-space:normal !important;">', $gara["NewsText"], '</p>
            <div style="clear:both;"></div>
        </div>';
        }

        mysql_close($connessione);
        ?>

    </div>


    <div style="clear:both;"></div>

</div>
<img id="nextnws" src="img/f_off_dx.png" />