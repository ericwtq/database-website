<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of register
 *
 * @author tianqi
 */
class register {
    //var $success=TRUE;
    function create_new($id,$name,$city,$state,$zipcode,$street,$gender,$passkey,$phone,$email,$db_link)
    {
        //$query="INSERT INTO TABLE customer(customer_id,customer_name,city,state1,zipcode,street,gender,passkey) VALUES ('$id','$name','$city','$state','$zipcode','$street','$gender','$password');"; 
      
        //$db_link->query($query);
        
        
        $sql = "INSERT INTO customer (customer_id, customer_name, city, state1, zipcode, street, gender, passkey,phone,email) VALUES ('$id', '$name', '$city', '$state', '$zipcode', '$street', '$gender', '$passkey','$phone','$email');";
        $db_link->query($sql);    
        /**
        if(!mysqli_query($db_link, $query))
        {
            $success=FALSE;
        }
        return $success;
        **/
    }
    
    function test_email($email)
    {
        $emailErr="";
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
        {
             $emailErr = "invalid format"; 
        }
        
        return $emailErr;       
    }
    
    function test_phone($phone)
    {
        $phoneErr="";
        if(strlen($phone)!=10)
        {
            $phoneErr="invalid format";
        }
        return $phoneErr;
    }
    
    function test_userid($userid,$db_link)
    {
        $userErr="";
        $sql="SELECT * FROM customer WHERE customer_id='$userid';";
        $result=$db_link->query($sql);
        if(($result->num_rows)!=0)
        {
            $userErr="this id has been used";
        }
        return $userErr;
    }
    
    
    
}
