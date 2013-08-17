<?php
include '../php/db_account.php';
include '../php/db_connect.php';
?>


<img id="prevImg" src="img/f_off_sx.png"/>
<div id = "galleryImg" class="cycle-slideshow"
     data-cycle-fx="carousel"
     data-cycle-timeout="0"
     data-cycle-carousel-visible=3
     data-allow-wrap=false
     data-cycle-slides="> div"
     data-cycle-next="#nextImg"
     data-cycle-prev="#prevImg">

    <?php
    $sql = "SELECT `ImageTitle`, `ImagePath` FROM `images` ORDER BY `InsDate`";
    $res = mysql_query($sql) or die(mysql_error());
    while ($row = mysql_fetch_row($res)) {
        $path = $row[1];
        $title = $row[0];
        $pathcolor = substr($path, 0, -4);
        $pathcolor .= "-color.jpg";
        //  <a href="big1.jpg" rel="gallery"  class="pirobox_gall" title="your title">
        //      <img src="small1.jpg"  />
        //  </a>

        echo "<div><a href='$pathcolor' rel='gallery'  class='pirobox_gall' title='$title'><img style='height: 100%;' class = 'grey2color' src = '$path' alt = '$title' /></a>";

        if ($row = mysql_fetch_row($res)) {
            $path = $row[1];
            $title = $row[0];
            $pathcolor = substr($path, 0, -4);
            $pathcolor .= "-color.jpg";
            echo "<br/><a href='$pathcolor' rel='gallery'  class='pirobox_gall' title='$title'><img style='height: 100%;' class = 'grey2color' src = '$path' alt = '$title' /></a>";
        }

        echo "<div style='clear:both'></div></div>";
    }
    ?>

</div>
<!-- END galleryImg -->


<img id="nextImg" src="img/f_off_dx.png"/>

<img id="prevVid" src="img/f_off_sx.png"/>
<div id = "galleryVid" class="cycle-slideshow"
     data-cycle-fx="carousel"
     data-cycle-timeout="0"
     data-cycle-carousel-visible=3
     data-allow-wrap=false
     data-cycle-slides="> div"
     data-cycle-next="#nextVid"
     data-cycle-prev = "#prevVid">


    <?php
    $query = "SELECT `IdVideo`, `VideoTitle` FROM `video` ORDER BY `InsDate` DESC";
    $result = mysql_query($query) or die(mysql_error());
    while ($row = mysql_fetch_row($result)) {
        $id = $row[0];
        $title = $row[1];
        // http://www.youtube.com/watch?v=aMimeO279YE
        // <a href="http://player.vimeo.com/video/18361415" rel="iframe-900-350" class="pirobox_gall1" >Vimeo video</a>
        echo "<div><a href='http://www.youtube.com/embed/$id' rel='iframe-900-350' class='pirobox_gall1' title='$title' ><img src='http://img.youtube.com/vi/$id/0.jpg' /></a><div style='clear:both'></div></div>";
    }
    ?>

</div>
<!-- END galleryVid -->
<img id="nextVid" src="img/f_off_dx.png" />

<script type="text/javascript">
    $( document ).ready( function() {
        $().piroBox_ext( {
            piro_speed: 900,
            bg_alpha: 0.5,
            piro_scroll: true //pirobox always positioned at the center of the page
        } );
    } );
</script>