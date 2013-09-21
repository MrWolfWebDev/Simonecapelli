<div id ="galleryImgPopup" style="display: none" >

    <img style="position: absolute; left: -60px; top: 0;" id="prevImgPop" src="img/f_off_sx.png"/>
    <div id = "galleryImgSlider" class="cycle-slideshow"
         data-cycle-fx="scrollHorz"
         data-cycle-timeout="0"
         data-cycle-next="#nextImgPop"
         data-cycle-prev="#prevImgPop">

        <?php
        $sql = "SELECT `ImageTitle`, `ImagePath` FROM `images` ORDER BY `InsDate`";
        $resultHidden = mysql_query($sql) or die(mysql_error());
        while ($rowHidden = mysql_fetch_row($resultHidden)) {
            $path = substr($rowHidden[1], 0, -4);
            $path .= "-color.jpg";
            $title = $rowHidden[0];

            echo "<img style='width: 100%;' src = '$path' alt = '$title' />";
        }
        ?>

    </div>
    <img style="position: absolute; right: -60px; top: 0;" id="nextImgPop" src="img/f_off_dx.png"/>

</div>