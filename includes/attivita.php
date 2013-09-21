<a href="javascript:openLinka('includes/gara.php')"><div id="t_att" style="margin-left:10% !important;" class="bactive"><b>GARE</b></div></a>

<a href="javascript:openLinka('includes/evento.php')"><div id="t_att" style="margin-left:23% !important;"><b>EVENTI</b></div></a>
 

<img id="prevatt" src="img/f_off_sx.png"/>

<div id = "contatt" style="top:40%; height:45%; background:none; margin-top:0.3%;">
<br />  
            <div style="height:100%; width:100% !important;" id = "galleryatt" class="cycle-slideshow" 
                data-cycle-fx="carousel"
                data-cycle-timeout="0"
    		data-cycle-carousel-visible=3
   		data-allow-wrap=false
                data-cycle-slides="> div"
                data-cycle-next="#nextatt"
                data-cycle-prev="#prevatt">
                <?php

				require_once('../php/db_account.php');
				require_once('../php/db_connect.php');
				require_once('../php/date.php');

				//Gara
		
				$sql = "SELECT `DataGara`, `LuogoGara`, `DescGara`, `LinkGara`, `TitoloGara` FROM `gare`";
				$result=mysql_query($sql) or die(mysql_error()) ;

				while ($gara = mysql_fetch_assoc($result))
				{
				echo'<div class="casellaatt"><b>',
	data_it($gara["DataGara"]),'</b><br><br>',	
	'<p style="white-space:normal !important;"><a href="',$gara["LinkGara"],'" target="_blank"><b>',$gara["TitoloGara"],'</b></a></p><br><i>',
	$gara["LuogoGara"],'</i><br><br><p style="white-space:normal !important;">',
	$gara["DescGara"],'</p><br><br>',
	'<div style="clear:both;"></div></div>';
				}

				mysql_close($connessione);
				?>
                
              
                </div>
              
              
    </div>

  <div style="clear:both;"></div>

</div>

<img id="nextatt" src="img/f_off_dx.png" />