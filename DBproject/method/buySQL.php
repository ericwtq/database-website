<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of doSQL
 *
 * @author tianqi
 */
class buySQL {
    

    function buy($model,$quan,$db_link)
    {
        $sql1="UPDATE laptop SET Amount=Amount-'$quan',sold=sold+'$quan'  WHERE Model='$model';";
  
        $sql2="UPDATE desktop SET Amount=Amount-'$quan',sold=sold+'$quan' WHERE Model='$model';";
        $db_link->query($sql1);
        $db_link->query($sql2);
    }
    
    
    function add_transaction($c_id,$model,$quan,$o_id,$price,$db_link)
    {
        $sql="INSERT INTO transactions(order_ID,product_name,price,quantity,customer_ID ) VALUES('$o_id','$model','$price','$quan','$c_id');";
        $db_link->query($sql);
        
    }
    
    function get_price($model,$db_link,$quan)
    {
        $sql1="SELECT Price FROM desktop WHERE Model='$model';";
        $sql2="SELECT Price FROM laptop WHERE Model='$model';";
        $result1=$db_link->query($sql1);
        $result2=$db_link->query($sql2);
        if(($result1->num_rows)===0)
        {
            $row = mysqli_fetch_array($result2);
            $price=$row['Price'];
            return $price*$quan;
        }
        else
        {
            $row = mysqli_fetch_array($result1);
            $price=$row['Price'];
            return $price*$quan;
        }
        
        
    }
    
    
    function judge_enough($quan,$db_link,$model)
    {
        $sql1="SELECT Amount FROM desktop WHERE Model='$model';";
        $sql2="SELECT Amount FROM laptop WHERE Model='$model';";
        $result1=$db_link->query($sql1);
        $result2=$db_link->query($sql2);
        if(($result1->num_rows)===0)
        {
            $row = mysqli_fetch_array($result2);
            $amount=$row['Amount'];
            return $amount-$quan;
        }
        else
        {
            $row = mysqli_fetch_array($result1);
            $amount=$row['Amount'];
            return $amount-$quan;
        }
        
        
        
    }
    
    
    
    
    
    
    
}
