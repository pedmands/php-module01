<?php
$flowers = array('tulips', 'roses', 'daffodils', 'orchids', 'daisies');
$flowers[] = 'irises';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Using a foreach Loop</title>
<link href="../../styles/exercises.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Looping through a Simple Array</h1>
<ol>
<?php
foreach ($flowers as $flower) {
	if ($flower == 'daffodils') {
		continue;
	}
	echo '<li>' . ucfirst($flower) . '</li>';
	if ($flower == 'orchids') {
		break;
	}
}
?>
</ol>
</body>
</html>