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

        <?php
        
        include 'F:\wamp64\www\DBproject\method\connclose.php';
        include 'F:\wamp64\www\DBproject\method\searchSQL.php';
        
        
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
           $mysqli = new connclose();
           $db_link=$mysqli->db_connect('computersale'); 
           $searchSQL=new searchSQL();
           $kind=$_POST['kind'];
           $cate=$_POST['cate'];
           $Order=$_POST['orderby'];
           $keyword_temp=$_POST['keyword'];
           $keyword="%$keyword_temp%";
           if($kind=='laptop')
           {
               if($Order=="Price")
               {
                   $result=$searchSQL->search_laptop_P($cate, $keyword, $db_link,$Order);
               }
               else
               {
                    $result=$searchSQL->search_laptop_s($cate, $keyword, $db_link,$Order);
               }
               
           }
           else
           {
               if($Order=="Price")
               {
                     $result=$searchSQL->search_desktop_P($cate, $keyword, $db_link,$Order);
               }
             else
             {
                   $result=$searchSQL->search_desktop_s($cate, $keyword, $db_link,$Order);
             }
           }
           
           echo "<form method='post' action='order.php'>";
           echo "<table border='1' style='margin: 0 auto;'>
                 <tr>
                 <th>Model</th>
                 <th>Price</th>
                 </tr>";
           while($row = mysqli_fetch_array($result))
           {
                echo "<tr>";
                echo "<td><input type='checkbox' name='choose[]' value='". $row['Model'] ."'/>" . $row['Model'] . "</td>";
                echo "<td>" . $row['Price'] . "</td>";
                echo "</tr>";
           }
           echo"<tr>";
           echo"<td></td>";
           echo"<td>";
           echo"<input type='submit' Value='buy' name='buy'/>";
           echo"</td>";
           echo"</tr>";
           echo "</table>";
           
           echo "</form>";
           
        }
        ?>
        
        
 
        
        <div id="search">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <p>
            <select name="kind">
                <option>desktop</option>
                <option>laptop</option>
            </select>
        </p>
        <p>
            <select name="cate">
                <option>cpu</option>
                <option>model</option>
            </select>
        </p>
        <p>sort by
            <select name="orderby">
                <option>Price</option>
                <option>sold</option>
            </select>
        </p>
        <p><input type="text" value="" name="keyword" size="50"/></p>
        <p><input type="submit" value="submit"></p>
        </form>
        </div>
        
        
        <div id="footer">
		Computer Noobs 2016
	</div>
    </body>
</html>
