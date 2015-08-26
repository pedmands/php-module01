<?php 
if (isset($_POST['bouquet'])) {

    $color = [];
    $quantity = [];
    $image = [];

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'color_') === 0) {
            $color[substr($key, 6)] = $value;
        } //checks if it begins with color_
        elseif (strpos($key, 'qty_') === 0) {
            $quantity[substr($key, 4)] = $value;
        } //if " quantity
        if (strpos($key, 'image_') === 0) {
            $image[substr($key, 6)] = $value;
        } //if " image
    } //foreach

// hardcode prices:
    $price = [    
        'Calla_Lilies' => 3,
        'Sunflowers' => 3,
        'Iris' => 2,
        'Peruvian_Lilies' => 2,
        'Daffodils_(Narcissus)' => 2,
        'Gerbera_Daisies' => 3,
        'Dendrobium_Orchid' => 4,
        'Roses' => 3,
        'Lilies' => 3,
        'Tulips' => 2,
        'Lilac' => 4,
        'Daisies' => 1
    ];
} //if
function getColor($filename) {
    $parts = explode('_', $filename);
    return ucfirst($parts[2]);
}
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Order Details - Hansel and Petal</title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link href="styles/handp.css" rel="stylesheet" type="text/css">
</head>
<body class="no_col_2">
<div id="site">
<?php include 'includes/header.php'; ?>
<?php include 'includes/navigation.php'; ?>

<div id="content">
<div id="breadcrumbs" class="reset menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="bouquet.php">Build a Bouquet</a></li>
        <li>Order Details</li>
    </ul>
</div>
<div id="col_1" role="main">
    <h1 class="inline_block">Your Order</h1>
    <?php if (!isset($quantity) || array_sum($quantity) === 0 ) { ?>
    <p>Your basket is empty, silly.</p>
    <?php } else { ?>
    <p>Please check the details of your order.</p>

<table id="order_details">
        <tr>
            <th scope="col">&nbsp;</th>
            <th scope="col">Item</th>
            <th scope="col">Color</th>
            <th scope="col">Quantity</th>
            <th scope="col">Cost</th>
        </tr>

<!-- Building the order: -->
<?php foreach ($quantity AS $flowername => $amount):
        if ($amount > 0) :?>
            <tr>
                <td>
                    <img src="images/<?php
                    if (isset($color[$flowername])) {
                        echo $color[$flowername];
                    } else {
                        echo $image[$flowername];
                    }
                    ?>.jpg" alt="" width="80" height="80"/>
                </td>
                <td><?php echo str_replace('_', ' ', $flowername); ?></td>
                <td><?php
                if (isset($color[$flowername])) {
                    echo getColor($color[$flowername]);
                } else {
                    echo '&nbsp;';
                }
                ?></td>
                <td><?php echo $amount; ?></td>
                <td>$ <?php echo $cost = $amount * $price[$flowername]; 
                $total += $cost; ?></td>
            </tr>
        <?php 
        endif;
        endforeach; ?>
<tr>
    <td colspan="4">Shipping</td>
    <td><?php 
    if ($total < 75) {
        echo '$10';
        $total += 10;
    } else {
        echo 'FREE!';
    }
    ?></td>
</tr>
<tr>
    <td colspan="4">Total</td>
    <td>$<?php echo $total; ?></td>
</tr>

</table>

    <div id="order_buttons">
        <form method="post">
            <span>
            <input class="btn alt" value="Cancel Order" name="cancel" id="cancel" type="submit">
            </span> <span>
            <input class="btn checkout" value="Confirm Order" type="submit">
            </span>
        </form>
    </div>
    <?php } ?>
</div>
</div>
<?php include 'includes/footer.php'; ?>
</div>
<script src="js/jquery-1.10.2.min.js"></script> 
<script src="js/scripts.js"></script>
</body>
</html>