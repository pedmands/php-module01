<?php
ini_set('display_errors','0');
  $message = '';
  $db = new MySQLi('localhost','phpwebdes','Gco6ign!', 'hanselandpetal');
  if ($db->connect_error) { /* if there is a connection error, */
    $message = $db->connect_error; // store it in the message var.
  } else {
    $sql = 'SELECT * FROM arrangements'; // build the query,
    $result = $db->query($sql); // execute the query, storing the results in a variable.
    if ($db->error) { //if there is a query error,
        $message = $db->error; //store it in the message var.
    } // if query error
  } // good connection else
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Mixed Arrangements - Hansel and Petal</title>
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
<link href="../styles/handp.css" rel="stylesheet" type="text/css">
</head>

<body class="no_col_2">
<div id="site">
<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>
    <div id="content">
        <div id="breadcrumbs" class="reset menu">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../arrangements.php">Arrangements</a></li>
                <li>Mixed Arrangements</li>
            </ul>
        </div>
        <div id="col_1" role="main">
            <h1 class="inline_block">Mixed Arrangements</h1>
            <h2 class="h3 inline_block">Mixed bouquets with the bright colors of Spring</h2>
            <div class="cols lg_margin">
                <div class="col sub">
                    <p class="w210">Hansel &amp; Petal combines the highest quality 
                        flowers in unique, colorful arrangements and bouquets that are sure to 
                        make everyone happy.</p>
                    <p>Choose from our popular arrangements or <a href="../bouquet.php" class="btn alt inconsistent_mt"><span class="normalcase">Create Your Own</span> Custom Bouquet</a></p>
                </div>
                <div class="col main">
                    <div id="feature">
                        <div class="inner">
                            <p class="overlay large">Arrangements for Every Occasion</p>
                            <p class="overlay price">Starting at $39.95</p>
                            <img src="../images/710_arrangement_97881968.jpg" alt="Mixed Arrangement" height="300" width="710"> </div>
                    </div>
                </div>
            </div>
            <?php if ($message) { ?>
                <h2 class="inline_block">Well, sunnova...</h1>
                <p>The site encountered an error, please try loading the page again.</p>
               <?php } else { ?>
            <div class="page open">

        <?php 
        $i = 0; //set counter to 0
        while ($row = $result->fetch_assoc()) { //begin while loop
        if ($i % 4 === 0) { // generate opening div & ul tags first time through loop ?> 
        <div class="section">
        <ul class="reset tiles">
        <?php } //end opening tag generation ?>
            <li> <a href="details.php?id=<?php echo $row['id']; ?>"> <img src="../images/<?php echo $row['image']; ?>" alt="<?php echo $row['alt']; ?>" height="200" width="200">
                <h3 class="h4"><?php echo $row['title']; ?></h3>
                <p class="reset">From $<?php echo $row['price']; ?></p>
                </a> </li>
        <?php 
        $i++; // this is where counter reaches 4
        if ($i % 4 === 0 ) { //generate closeing tags last time through loop ?>    
        </ul>
        </div><!-- section --> 
        <?php } //end if closing tag generation
            } //end while loop ?>
</div><!-- page -->
            <?php } // end of else page?> 
        </div><!-- main -->
    </div><!-- content -->
<?php include '../includes/footer.php'; ?>
</div>
<script src="../js/jquery-1.10.2.min.js"></script> 
<script src="../js/scripts.js"></script>
</body>
</html>