<!DOCTYPE html>
<html>
<head>
<title>Get bus info</title>
<link rel="stylesheet" type="text/css" href="busstyle.css" />
</head>
<body>
<h1>Bus Info</h1>
<p>Creator: Michael Gordon</p>
<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="Refresh">
</FORM>
<META HTTP-EQUIV="refresh" CONTENT="30">

<?php
date_default_timezone_set("America/New_York");
getTimeNow();

function getTimeNow(){
	$now = strtotime("now");
	echo "It's now " . date("h:i:sa", $now) . "<br>";
}

function isCurrent($time){
	$time = strtotime($time);
	$time = date("h:i",$time);
	$now = strtotime("now");
	$now = date("h:i", $now);
	if ($now == $time){
		return TRUE;
	}
	else {
		return FALSE;
	}
}

function getTimes($bus, $stop, $name){
    	$url = "http://mybusnow.njtransit.com/bustime/wireless/html/eta.jsp?route=" . $bus . "&direction=New+York&id=" . $stop . "&showAllBusses=off";
    	$content = file_get_contents($url);
	$pos = strpos($content,"Currently")+10;
	$time = substr($content,$pos,6);
    	$pos = strpos($content,"MIN")-8;
	if ($pos < 0) return; //echo " is not available ";
	echo '<font size ="30"> ' . $bus . " at " . $name . ' in ';
	while ($pos > 0){
		$content = substr($content,$pos);
		preg_match('/([0-9][0-9]?)/', $content, $TimeMatch);
		echo '<font color="red">' . $TimeMatch[1] . '</font> min ';
		preg_match('/To (1[67][75][TQ]?)/', $content, $BusMatch);
		$content = substr($content,25);
		$pos = strpos($content,"MIN")-8;
	}
    	echo "<br></font>Stop # $stop. ";
	if (isCurrent($time)){
		echo " <font color='green'>Current as of $time </font>";
	}
	else {
		echo " <font color='brown'>Last updated at $time </font>";
	}
	echo " <a href=' $url'>link</a><br>"; 
}//func

echo '<font size = "30"><br><b>To NYC</b></font><br>';
getTimes("167","13787","Teaneck & Grayson");
getTimes("167","13695", "Q.A. & Cherry");
getTimes("175","13630","Cedar & Grange");
echo '<font size = "30"><br><b>To Teaneck</b></font><br>';
getTimes("167","13681","Q.A. & Carlton");
getTimes("167","13755","Teaneck & Holland");
echo '<font size = "30"><br><b>Other</b></font><br>';
getTimes("780","13633","Cedar & Grange");
getTimes("780","13623","Cedar & W. Catalpa");

?>

</body>
</html>