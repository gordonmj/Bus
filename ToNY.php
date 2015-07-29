<!DOCTYPE html>
<html>
<head>
<title>Teaneck to NY</title>
<link rel="stylesheet" type="text/css" href="busstyle.css" />
</head>
<body>
<META HTTP-EQUIV="refresh" CONTENT="30">
<h2>Welcome to My NJ Transit Bus Dashboard</h2>
<p>It's still very much in the early stages, and useful only to me, most likely, but if you commute from central Teaneck to Manhattan, you might find it useful too.</p>
<?php
include 'bus.php';
getTimes("167T","13787","Teaneck & Grayson");
getTimes("167Q","13695", "Q.A. & Cherry");
getTimes("175","13630","Cedar & Grange");
getTimes("171","13732","Rt4 & Margaret");
?>
<p></p>
<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="Refresh">
</FORM>

<p><a href="ToTeaneck.php">Buses from NY to Teaneck</a></p>
<p><a href="OtherTeaneck.php">Other Teaneck buses</a></p>
<p><a href="DIY.php">Make your own (IN PROGRESS)</a></p>

</body>
</html>
