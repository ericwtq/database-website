<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start(); ?>
<html>
   <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="style2.css" type="text/css" media="screen">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <title>Computer Noobs</title>
    </head>

    <body>
        <body>
		<div id="container">
		<div id="header" title="sitename">
		<div id="skipmenu"><a href="index.php">Log out</a></div>
		<div id="skipmenu2"><a href="previous.php">My Account</a></div>
		<img class="imagefloat" src="psyduck.jpg" alt="" width="40" height="40">
			<h1>
				Computer Sale !
			</h1>
		</div>
		<div id="mainnav">
			<ul>
				<li><a href="search.php">Search Products</a></li>
				<li><a href="https://www.google.com/maps/@40.4437327,-79.954623,17z">We are Here</a></li>
				<li><a href="http://www.weibo.com/u/1908559525">Contact Us (if you forget password or have any questions)</a></li>
			</ul>
		</div>

        <?php
        include 'F:\wamp64\www\DBproject\method\buySQL.php';
        include 'F:\wamp64\www\DBproject\method\connclose.php';
        $disp="congraduation you have palced you order!";
        $buy=$_SESSION['buy'];
        $quan=$_POST['quan'];
        $mysqli = new connclose();
        $buySQL=new buySQL();
        $db_link1=$mysqli->db_connect('peoplebuy');
        $db_link2=$mysqli->db_connect('computersale');
        $o_id=rand(1000,9999);
        for($x=0;$x<count($quan);$x++)
        {
            $product=$buy[$x];
            $quantity_temp=$quan[$x];
            $quantity=(int)$quantity_temp;
            $jud=$buySQL->judge_enough($quantity, $db_link2, $product);
            //echo $quantity;
            if($jud<0)
            {
                $disp="has not enough in stock!";
                break;
            }
            $price=$buySQL->get_price($product, $db_link2, $quantity);
            $buySQL->buy($product, $quantity, $db_link2);
            $buySQL->add_transaction($_SESSION['c_id'], $product, $quantity, $o_id, $price, $db_link1);
        }
        ?>
        <h1><?php echo $disp?></h1>
        <p><a href="previous.php">click here to see your order history and personal information</a></p>
        <p><a href="search.php">click here to continue shopping!</a></p>
        
        <div id="footer">
			Computer Noobs 2016
		</div>

                </div>
    </body>
</html>
