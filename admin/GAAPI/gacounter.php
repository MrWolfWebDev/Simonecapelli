<?php

ini_set("error_reporting", "E_ALL");
/** GAcounter 1.1 - 03 settembre 2012
 * based on GAPI php class
 * ( http://code.google.com/p/gapi-google-analytics-php-interface/ )
 * developed by Marco Cilia ( http://www.goanalytics.info )
 */
// inserisci login e password che usi abitualmente per accedere a Google Analytics
define('ga_email', 'fotoantare@gmail.com');
define('ga_password', '1loredanaonline');
define('ga_profile_id', '43192434');
$startdate = '2013-08-13'; //data nel formato YYYY-MM-DD

require 'gapi.class.php';

$ga = new gapi(ga_email, ga_password);

$ga->requestReportData(ga_profile_id, array('visitorType'), array('visitors', 'pageviews', 'visits'), '', '', '2012-02-16');



/** non modificare niente qui sotto */
echo "<div id=\"gacounter\">";
echo "<div id=\"visits\">visite</div><div class=\"numero1\">" . $ga->getVisits() . "</div>";
echo "<div id=\"visitors\">visitatori</div><div class=\"numero2\">" . $ga->getVisitors() . "</div>";
echo "<div id=\"pv\">pagine viste</div><div class=\"numero1\">" . $ga->getPageviews() . "</div>";
echo "<div id=\"credits\"><a href=\"http://www.goanalytics.info/gac.php\">GAcounter by goanalytics.info</a></div>";
echo "</div>";
?>