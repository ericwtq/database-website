<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_start(); 
?>


<html>
    <head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style2.css" type="text/css" media="screen">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <title>Computer Noobs</title>
    </head>

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
<!-- <li> defines a list item and be used in ordered lists, unordered lists and menu lists.-->
	</div>
        <form method="post" action="place.php" >
            <table border="1" style='margin: 0 auto;'>
                <tr>
                    <th>Model</th>
                    <th>Amount</th>
                </tr>
                <?php
                $products=$_POST['choose'];
                $_SESSION['buy']=$products;
                foreach ($products as $product)
                {
                    echo"<tr>";
                    echo"<td name='buy[]'>".$product."</td>";
                    echo"<td><input type='text' name='quan[]'/></td>";
                    echo"</tr>";
                }   
                ?>
                <tr><td></td><td><input type="submit" name="place" value="place"/></td></tr>
            </table>
            
        </form>
        
    </body>
</html>
