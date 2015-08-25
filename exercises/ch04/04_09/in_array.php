<?php
$flowers = array('tulips', 'roses', 'daffodils', 'orchids', 'daisies');
$flowers[] = 'irises';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Using in_array()</title>
<link href="../../styles/exercises.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Finding an Array Element</h1>
<?php
  $order = 'roses';
  if (in_array($order, $flowers)) {
  	echo "<p>Yes, $order are in stock</p>";
  } else {
  	echo "<p>Sorry, we're fresh out of $order!</p>";
  }
?>
</body>
</html>