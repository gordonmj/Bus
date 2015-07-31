<!DOCTYPE html>
<html>
<head>
<title>Make your own NJ bus dashboard</title>
<link rel="stylesheet" type="text/css" href="busstyle.css" />
</head>
<body>
<h2>Enter up to three stops to get NJ Transit bus info.</h2>
<img src="whichway2.jpg">
<form action="get_my_bus.php">
Route # (e.g. 167)<br>
<input type="number" name="route1" value=167 id="form"><br>
Stop # (e.g. 13695)<br>
<input type="number" name="stop1" value=13695 id="form"><br>
Walking time (how long it takes you to walk to the stop)<br>
<input type="number" name="walking1" value=0 id="form")<br><br>
Stop description - optional (e.g. "Cedar Lane and Queen Anne Road")<br>
<input type="text" name="desc1" value="Queen Anne & Cherry Ln" id="form"><br>
<br>
Route:<br>
<input type="number" name="route2" value=167 id="form"><br>
Stop:<br>
<input type="number" name="stop2" value=13787 id="form"><br>
Walking time<br>
<input type="number" name="walking2" value=0 id="form")<br><br>
Description:<br>
<input type="text" name="desc2" value="Teaneck Rd & Grayson" id="form"><br><br>
Route:<br>
<input type="number" name="route3" value=175 id="form"><br>
Stop:<br>
<input type="number" name="stop3" value=13630 id="form"><br>
Walking time<br>
<input type="number" name="walking3" value=0 id="form")<br><br>
Description:<br>
<input type="text" name="desc3" value="Cedar Ln & Grange" id="form"><br>
<input type="submit" value="Submit"><br>
<p></p>

<p><a href="ToTeaneck.php">Buses from NY to Teaneck</a></p>
<p><a href="OtherTeaneck.php">Other Teaneck buses</a></p>

</body>
</html>
