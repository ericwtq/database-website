<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="style2.css" type="text/css" media="screen">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <title>Computer Noobs</title>
</head>
<body>
<div id="container">
<!--The <div> tag defines a division or a section in an HTML document and the "id" refers to a specific element-->
	<div id="header" title="sitename">
            <div id="skipmenu"><a href="index.php">Log out</a></div>
	<img class="imagefloat" src="psyduck.jpg" alt="" width="40" height="40">
		<h1>
			Computer Sale !
		</h1>
	</div>
	<div id="mainnav">
		<ul>
				<li><a href="https://www.google.com/maps/@40.4437327,-79.954623,17z">Your BOSS is here</a></li>
				<li><a href="http://www.weibo.com/u/1908559525">BOSS's Weibo</a></li>
		</ul>
<!-- <li> defines a list item and be used in ordered lists, unordered lists and menu lists.-->
	</div>
	<div id="menu">
		<h3>
			Manager Bar
		</h3>
		<ul>
			<li><a href="storemanage.php">add a new store</a></li>
                        <li><a href="orderview.php">view all order</a></li>
                        <li><a href="managecus.php">manage the customer</a></li>
                        <li><a href="productmanage.php">manage product</a></li>
		</ul>
 	</div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="1">
            <tr>
                <td>
                    <select name="model">
                        <?php
                            include 'F:\wamp64\www\DBproject\method\connclose.php';
                            include 'F:\wamp64\www\DBproject\method\manageSQL.php';
                            $mysqli=new connclose();
                            $manage=new manageSQL();
                            $db_link=$mysqli->db_connect('computersale');
                            $result=$manage->show_dproductid($db_link);
                            while($row = mysqli_fetch_array($result))
                                {
                                  echo"<option>".$row['Model']."</option>";
                                }                           
                        ?>
                    </select>
                </td>
                <td><input type="text" name="newquan" value=""/></td>
            </tr>
        </table>
        <input type="submit" value="update" name="update"/>
        </form>   
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $model=$_POST['model'];
            $newquan_temp=$_POST['newquan'];
            $newquan=(int)$newquan_temp;
            if($newquan<0)
            {
                echo "<script>alert('The stock cannot be negative!');</script>";
            }
            else
            {
                $manage->update_quan($newquan, $model, $db_link);
            }
        }
        ?>
        
        
         <div id="footer">
			Computer Noobs 2016
		</div>

    </body>
        
    </body>
</html>
