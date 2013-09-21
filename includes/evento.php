   <br />         <div style="height:100%; width:100% !important;" id = "galleryatt" class="cycle-slideshow" 
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


 //Eventi

$sql = "SELECT `EventDate`, `EventTitle`, `EventDesc`, `EventLink`, `EventPlace` FROM `eventi`";
$result=mysql_query($sql) or die(mysql_error()) ;

while ($gara = mysql_fetch_assoc($result))
{
	echo '<div class="casellaatt" class="ombra"><b>',
	data_it($gara["EventDate"]),
	'</b><br><br><p style="white-space:normal !important;"><a href="',$gara["EventLink"],'" target="_blank"><br><b>',$gara["EventTitle"],'</b></p></a>',
	'<br><i>',
	$gara["EventPlace"],'</i><br><br><p style="white-space:normal !important;">',
	$gara["EventDesc"],'</p><br>',
	'</div>';
}

mysql_close($connessione);
?>
                
              
                </div>
              
              
    </div>
  <div style="clear:both;"></div>




