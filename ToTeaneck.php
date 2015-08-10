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
<font size = "30"><br><b>To Teaneck</b></font><br>

<?php
include 'bus.php';
getTimes("167Q","13681","Q.A. & Carlton","","5");
getTimes("167T","13755","Teaneck & Holland","","7");
?>

</body>
</html>
