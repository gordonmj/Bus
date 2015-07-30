<html>
<body>
Press ctrl+D to add this page to your favorites. (Make sure the URL contains all bus/route parameters.)<br><br>
<img src="whichway1.jpg">
<?php
include 'bus.php';
$results = array();
$results[] = getTimes($_GET["route1"],$_GET["stop1"],$_GET["desc1"]);
$results[] = getTimes($_GET["route2"],$_GET["stop2"],$_GET["desc2"]);
$results[] = getTimes($_GET["route3"],$_GET["stop3"],$_GET["desc3"]);
if ($results[0]+$results[1]+$results[2]==0){
	echo "<b>Currently no bus information is available.</b><br>";
}
$url = "http://bit.ly/NJBus";
echo "<br><br>If you want to share this, use the URL $url so I can track the clicks.";
?>
<FORM><INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>
</body>
</html>
