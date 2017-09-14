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
		<div id="content">
		<div class="blogentry">
                <h2>order history</h2>
		</div>

        <?php
        include 'F:\wamp64\www\DBproject\method\connclose.php';
        $user=$_SESSION['c_id'];
        $mysqli = new connclose();
        $db_link=$mysqli->db_connect('peoplebuy'); 
        $sql1="SELECT * FROM transactions WHERE customer_ID='$user';";
        $result1=$db_link->query($sql1);
        $sql2="SELECT * FROM customer WHERE customer_id='$user';";
        $result2=$db_link->query($sql2);
        ?>
   
        <table border="1" style="margin: 0 auto;">
            <tr>
                 <th>Order_ID</th>
                 <th>product</th>
                 <th>price</th>
                 <th>quantity</th>
                 <th>buyer</th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($result1))
            {
                echo"<tr>";
                echo"<td>".$row['order_ID']."</td>";
                echo"<td>".$row['product_name']."</td>";
                echo"<td>".$row['price']."</td>";
                echo"<td>".$row['quantity']."</td>";
                echo"<td>".$row['customer_ID']."</td>";
                echo"</tr>";
            }
            ?>
        </table>
        
        <h2>your information</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="1" style="margin: 0 auto;">
            <tr>
                 <th>id</th>
                 <th>name</th>
                 <th>city</th>
                 <th>state</th>
                 <th>zipcode</th>
            </tr>
        <?php
          $row = mysqli_fetch_array($result2);
                echo"<tr>";
                echo"<td>".$row['customer_id']."</td>";
                echo"<td>".$row['customer_name']."</td>";
                echo"<td>".$row['city']."</td>";
                echo"<td>".$row['state1']."</td>";
                echo"<td>".$row['zipcode']."</td>";
                echo"<tr>";
        ?>
            <tr>
                <td><input type="text" name="upate[]" value=""/></td>
                <td><input type="text" name="upate[]" value=""/></td>
                <td><input type="text" name="upate[]" value=""/></td>
                <td><input type="text" name="upate[]" value=""/></td>
                <td><input type="text" name="upate[]" value=""/></td>
            </tr>   
            <tr>
                <th>street</th>
                <th>gender</th>
                <th>password</th>
                <th>phone</th>
                <th>email</th>
            </tr>
            <?php
                echo"<td>".$row['street']."</td>";
                echo"<td>".$row['gender']."</td>";
                echo"<td>".$row['passkey']."</td>";
                echo"<td>".$row['phone']."</td>";
                echo"<td>".$row['email']."</td>";
                echo"</tr>";
            ?>
            <tr>
                <td><input type="text" name="upate[]" value=""/></td>
                <td><input type="text" name="upate[]" value=""/></td>
                <td><input type="text" name="upate[]" value=""/></td>
                <td><input type="text" name="upate[]" value=""/></td>
                <td><input type="text" name="upate[]" value=""/></td>
                <td><input type="submit" name="update" value="update"/></td>
            </tr>
            
        </table>
        </form>
        
        
        <?php
       
        
        
        //include 'F:\wamp64\www\DBproject\method\connclose.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //$mysqli1=new connclose();
            //$db_link1=$mysqli1->db_connect('peoplebuy');
            $newinfo=$_POST['upate'];
            $sql3="DELETE FROM customer WHERE customer_id='$user';";
            $db_link->query($sql3);
            $sql4="INSERT INTO customer (customer_id, customer_name, city, state1, zipcode, street, gender, passkey, phone,email) VALUES('$newinfo[0]','$newinfo[1]','$newinfo[2]','$newinfo[3]','$newinfo[4]','$newinfo[5]','$newinfo[6]','$newinfo[7]','$newinfo[8]','$newinfo[9]');";
            $db_link->query($sql4);
        }
        ?>
        
        <div>
		<p>
		
		</p>
		</div>
		<div id="footer">
			Computer Noobs 2016
		</div>

        
        
        
        
        
        
        
        
        
    </body>
</html>
