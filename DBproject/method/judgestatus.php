<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of judgestatus
 *
 * @author tianqi
 */
class judgestatus {

    function jd_root($username,$password)
    {
        $ad=FALSE;
        if($username=="admin" and $password=="admin")
        {$ad=TRUE;}
        return $ad;
    }
    
    function jd_exist($username,$password,$db_link)
    {
        $exist=TRUE;
        $sql="SELECT * FROM customer WHERE customer_id='$username' AND passkey='$password';";
        $result=$db_link->query($sql);
        if(($result->num_rows)===0)
        {$exist=FALSE;}
        return $exist;
    }
           
    
    
    
    
}
