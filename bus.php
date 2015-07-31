<!DOCTYPE html>
<html>
<head>
<title>Get bus info</title>
<link rel="stylesheet" type="text/css" href="busstyle.css" />
</head>
<body>
<?php
date_default_timezone_set("America/New_York");

function getTimeNow(){
	$now = strtotime("now");
	echo "It's now " . date("h:i:sa", $now) . "<br>";
}

function leaveHouse($minutes,$walktime){
	$minutes = intval($minutes);
	$walktime = intval($walktime);
	if ($minutes >= $walktime-1 && $minutes < $walktime+5){
		echo "<embed src='success.wav' autostart=true loop=false>";
		return true;
//		echo $minutes . "," . $walktime . "Git out!<br>";
//		echo "<script type='text/javascript'>for{(i=0;i<4;i++)playSound('bing');}</script>";
//		echo "<script type='text/javascript'>alert('Time to leave!');</script>";
	}
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

function getTimes($bus, $stop, $name,$walking="0"){
	$count = 0;
	$leave = false;
	$bnum = substr($bus,0,3);
    	$url = "http://mybusnow.njtransit.com/bustime/wireless/html/eta.jsp?route=" . $bnum . "&direction=New+York&id=" . $stop . "&showAllBusses=off";
    	$content = file_get_contents($url);
	$pos = strpos($content,"Currently")+10;
	$time = substr($content,$pos,6);
    	$pos = strpos($content,"MIN")-8;
	if ($pos < 0) return count; //echo " is not available ";
	
	echo '<font size ="30"> ' . $bus . " at " . $name . ' in';
	while ($pos > 0){
		$content = substr($content,$pos);
		preg_match('/([0-9][0-9]?)/', $content, $TimeMatch);
		echo ':<font color="red"> ' . $TimeMatch[1] . '</font> min ';
		$leave = $leave || leaveHouse($TimeMatch[1],$walking);
		preg_match('/\(Bus ([0-9]{4})/', $content, $BusMatch);
//		add_to_db($bus,$stop,$dest,$BusMatch[1],$TimeMatch[1]);
		$content = substr($content,25);
		$pos = strpos($content,"MIN")-8;
		$count=$count+1;
	}
    	echo "<br></font>Stop # $stop. ";
	if (isCurrent($time)){
		echo " <font color='green'>Current as of $time </font>";
	}
	else {
		echo " <font color='brown'>Last updated at $time </font>";
	}
	echo " <a href=' $url'>link</a><br>";
	if($leave){
		mail("neologue@gmail.com","Bus alert","$bus at $name","From: neologue@gmail.com X-Mailer:My PHP scripts");
	}
	return $count; 
}//func
function add_to_db($route,$stop,$dest,$vehicle,$minutes){
	$host="localhost";
	$user="root";
	$password="MacGuffin5%m";
	$dbname="bus";
	$con = mysql_connect($host, $user, $password, $dbname);
	if (!$con){
        	die("Could not connect: " . mysql_error());
		echo mysql_error();
	}

	$query = "use bus";

	$result = mysql_query($query);

	$query = "INSERT INTO stops (route,stop,dest,minutesto,bus,time,id) VALUES(
		'$route'
		,'$stop'
		,'$dest'
		,'$minutes'
		,'$vehicle'
		,'now()'
		,'null')";

	$result = mysql_query($query);
	
	$query = "delete from stops where id=1";

	$result = mysql_query($result);

	mysql_free_result($result);
	
	mysql_close($con);
}//func

?>
</body>
</html>
