<html>
<body>
Press ctrl+D to add this page to your favorites. (Make sure the URL contains all bus/route parameters.)<br><br>
<img src="whichway1.jpg">
<META HTTP-EQUIV="refresh" CONTENT="30">
<?php
include 'bus.php';
$results = array();
$results1 = getTimes($_GET["route1"],$_GET["stop1"],$_GET["desc1"]);
$results2 = getTimes($_GET["route2"],$_GET["stop2"],$_GET["desc2"]);
$results3 = getTimes($_GET["route3"],$_GET["stop3"],$_GET["desc3"]);
if ($results1+$results2+$results3==0){
	echo "<b>Currently no bus information is available.</b><br>";
}
$url = "http://bit.ly/NJBus";
?>
<FORM><INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>
</body>
</html>
