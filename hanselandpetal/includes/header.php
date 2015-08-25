<?php
/* $siteroot points to the development folder.
    Set it to an empty string when deploying to production */
/* Directories: */
$siteRoot = '/hanselandpetal';
?>
<div id="header" role="banner">
        <h1 id="logo"><a href="<?php echo $siteRoot; ?>/index.php"><img src="<?php echo $siteRoot; ?>/images/logo.png" alt="Hansel and Petal" height="124" width="207"></a></h1>
        <div class="inner">
            <ul id="quick_links" class="reset menu">
                <li><a href="#">My Account</a></li>
                <li><a href="<?php echo $siteRoot; ?>/order.php">View My Order</a></li>
                <li><a href="#">Customer Service</a></li>
            </ul>
            <form action="#" method="get" id="quick_search" role="search">
                <input id="quickSearch" class="text white" placeholder="Find the perfect flowers or plants…" type="search">
                <span class="btn_icon icon_search">
                <input value="Search" type="submit">
                </span>
            </form>
            <p id="offer">FREE Shipping on orders over $75.00!</p>
        </div>
    </div>