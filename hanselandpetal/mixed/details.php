<?php
  $message = '';
  $db = new MySQLi('localhost','phpwebdes','Gco6ign!', 'hanselandpetal');
  if ($db->connect_error) { /* if there is a connection error, */
    $message = $db->connect_error; // store it in the message var.
  } else {
    $sql = 'SELECT * FROM arrangements WHERE id=' . $db->real_escape_string($_GET['id']); // build the query,
    $result = $db->query($sql); // execute the query, storing the results in a variable.
    if ($db->error) { //if there is a query error,
        $message = $db->error; /*store it in the message var.*/
    } else {
        $row = $result->fetch_assoc();
    } // if-else query error
  } // good connection else
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Mixed Arrangements - Hansel and Petal</title>
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
<link href="../styles/handp.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="site">
<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>
    <div id="content">
        <div id="breadcrumbs" class="reset menu">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../arrangements.php">Arrangements</a></li>
                <li><a href="mixed.php">Mixed Arrangements</a></li>
                <li><?php if (isset($row['title'])){
                echo $row['title'];
                }?></li>
            </ul>
        </div>
        <div id="col_1" role="main">

        <?php if ($message) { ?>
        <h1 class="inline_block">Oops! We gotta prob, Bob...</h1>
         <p>That arrangement doesn't seem to exist. : /</p>
        <?php } else { ?>
            <h1 class="inline_block"><?php echo $row['title']; ?></h1>          
            <p class="figure"><img src="../images/<?php echo $row['image']; ?>" alt="<?php echo $row['alt']; ?>" width="200" height="200">
            Price from $<?php echo $row['price']; ?></p>
            <?php echo $row['description']; ?>
        </div>
        <div id="col_2">
        <h3>How to Order</h3>
        <p>All the flowers for our mixed arrangements are carefully selected by <a href="../designers.php">our talented designers</a> using the freshest flowers in season. To discuss your individual requirements, please call Hansel and Petal toll-free on <b>800-555-0199</b>.</p>
        </div>
        <?php } ?>
    </div>
<?php include '../includes/footer.php'; ?>
</div>
<script src="../js/jquery-1.10.2.min.js"></script> 
<script src="../js/scripts.js"></script>
</body>
</html>
