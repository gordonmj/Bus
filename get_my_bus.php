<html>
<body>
<?php
include 'bus.php';
getTimes($_GET["route1"],$_GET["stop1"],$_GET["desc1"]);
getTimes($_GET["route2"],$_GET["stop2"],$_GET["desc2"]);
getTimes($_GET["route3"],$_GET["stop3"],$_GET["desc3"]);
?>
</body>
</html>