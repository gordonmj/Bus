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
<font size = "30"><br><b>Other Teaneck</b></font><br>

<?php
include 'bus.php';
getTimes("780","13633","Cedar & Grange","5");
getTimes("780","13623","Cedar & W. Catalpa","5");
getTimes("780","12221","Summit & W. Pleasantview","20");
?>

</body>
</html>
