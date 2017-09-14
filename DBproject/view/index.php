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
        <title>Computer Noobs</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    </head>

    <body>
        <?php
            /**
            $mysqli = new mysqli('127.0.0.1', 'root', '', 'peoplebuy');
            $Pid='iiifffii';
            $Cid='kkkfffii';
            if(mysqli_connect_errno())
            {
                echo mysqli_connect_error();
            }
            $sql = "INSERT INTO customer (customer_id, customer_name, city, state1, zipcode, street, gender, passkey) VALUES ('$Pid', '$Pid', '$Pid', '$Pid', '$Pid', '$Pid', '$Pid', '$Pid');";
            $mysqli->query($sql);
             * 
             */
        
             include 'F:\wamp64\www\DBproject\method\connclose.php';
             include 'F:\wamp64\www\DBproject\method\judgestatus.php';
             
             /**
             $mysqli = new connclose();
             $db_link=$mysqli->db_connect('peoplebuy');
             $judge=new judgestatus();
             $k=$judge->jd_exist('a', 'a', $db_link);
             echo $k;
              * 
              */
             
             
      
             
             $erro="";
             if ($_SERVER["REQUEST_METHOD"] == "POST")
             {
                 $mysqli = new connclose();
                 $db_link=$mysqli->db_connect('peoplebuy');
                 $judge=new judgestatus();
                 $username=$_POST['username'];
                 $password=$_POST['password'];
                 $ad=$judge->jd_root($username, $password);
                 if($ad)
                 {
                     header('Location:manager.php');
                 }
                 $exist=$judge->jd_exist($username, $password, $db_link);
                 if(!$exist)
                 {
                     $erro="unvalid userid or password";
                 }
                 else
                 {
                     $_SESSION['c_id']=$username;
                     header('Location:search.php');
                     
                
                 }
                 
             }
              
              
             
        ?>
        
        <div id="container">
	<div id="header" title="sitename">
            <div id="skipmenu"><a href="createaccount.php">Create account</a></div>
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
	<div id="content">


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table border="1" style="margin: 0 auto;">
                <tr>
                    <td>username:</td>
                    <td><input type="text" value="" name="username" size="50"/><span class="error"><?php echo $erro?></span></td>
                </tr>
                <tr>
                    <td>password:</td>
                    <td><input type="password" value="" name="password" size="50"/></td>
                     <td><input type="submit" Value="login" name="login"/></td>
                </tr>
            </table>
        <div id="contents">
			<div class="blogentry">
			<p>
				 BUY! BUY! BUY!
			</p>
		</div>

        </form>
    </div>
	<div>
		<p>
		</p>
	</div>
	<div id="footer">
		 Computer Noobs 2016
	</div>
    </body>

</html>
