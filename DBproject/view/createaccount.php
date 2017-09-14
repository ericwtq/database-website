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
		<img class="imagefloat" src="psyduck.jpg" alt="" width="40" height="40">
			<h1>
				Computer Sale !
			</h1>
		</div>
		<div id="mainnav">
			<ul>
				<li><a href="https://www.google.com/maps/@40.4437327,-79.954623,17z">We are Here</a></li>
				<li><a href="http://www.weibo.com/u/1908559525">Contact Us (if you forget password or have any questions)</a></li>
			</ul>
		</div>
       
        <?php
        /**
            $mysqli = new mysqli('127.0.0.1', 'root', '', 'peoplebuy');
            $Pid='iiifeeeffii';
            $Cid='kkkffeeefii';
            if(mysqli_connect_errno())
            {
                echo mysqli_connect_error();
            }
            $sql = "INSERT INTO customer (customer_id, customer_name, city, state1, zipcode, street, gender, passkey) VALUES ('$Pid', '$Pid', '$Pid', '$Pid', '$Pid', '$Pid', '$Pid', '$Pid');";
            $mysqli->query($sql);
         * 
         */
        
        include 'F:\wamp64\www\DBproject\method\connclose.php';
        include 'F:\wamp64\www\DBproject\method\register.php';
        $phoneErr="";
        $emailErr="";
        $userErr="";
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $mysqli = new connclose();
            $db_link=$mysqli->db_connect('peoplebuy');
            $register=new register();
            $reg=$_POST['reg'];
            $phoneErr=$register->test_phone($reg[8]);
            $emailErr=$register->test_email($reg[9]);
            $userErr=$register->test_userid($reg[0],$db_link);
            if(strlen($phoneErr)==0 and strlen($emailErr)==0 and strlen($userErr)==0)
            {
                $sql="INSERT INTO customer (customer_id, customer_name, city, state1, zipcode, street, gender, passkey, phone,email) VALUES('$reg[0]','$reg[1]','$reg[2]','$reg[3]','$reg[4]','$reg[5]','$reg[6]','$reg[7]','$reg[8]','$reg[9]');";
                $db_link->query($sql);
                header('Location:index.php');
                
            }
        }
        

        ?>
        
  
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
       <table border="1" style="margin: 0 auto;">
                <tr>
                    <td>userid:</td>
                    <td><input type="text" value="" name="reg[]" size="50"/><span class="error"><?php echo $userErr?></span></td>
                </tr>
                <tr>
                    <td>name:</td>
                    <td><input type="text" value="" name="reg[]" size="50"/></td>
                </tr>
                <tr>
                    <td>city:</td>
                    <td><input type="text" value="" name="reg[]" size="50"/></td>
                </tr>
                 <tr>
                    <td>state:</td>
                    <td><input type="text" value="" name="reg[]" size="50"/></td>
                </tr>
                 <tr>
                    <td>zipcode:</td>
                    <td><input type="text" value="" name="reg[]" size="50"/></td>
                </tr>
                <tr>
                    <td>street:</td>
                    <td><input type="text" value="" name="reg[]" size="50"/></td>
                </tr>
                 <tr>
                    <td>gender:</td>
                    <td><input type="text" value="" name="reg[]" size="50"/></td>
                </tr>
                <tr>
                    <td>password:</td>
                    <td><input type="password" value="" name="reg[]" size="50"/></td>
                </tr>
                <tr>
                    <td>phone:</td>
                    <td><input type="text" value="" name="reg[]" size="50"/><span class="error"><?php echo $phoneErr?></span></td>
                </tr>
                <tr>
                    <td>email:</td>
                    <td><input type="text" value="" name="reg[]" size="50"/><span class="error"><?php echo $emailErr?></span></td>
                </tr>
                <tr>
                    <td><input type="submit" Value="register" name="register"/></td>
                    <td></td>
                </tr>
            </table>
        </form>
             
        <div id="footer">
			Computer Noobs 2016
		</div>
</div>
    </body>
</html>
