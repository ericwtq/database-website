<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manageSQL
 *
 * @author tianqi
 */
class manageSQL {
    //put your code here
    function view_allorder($db_link)
    {
        $sql="SELECT * FROM transactions;";
        $result=$db_link->query($sql);
        return $result;
    }
    
    function all_customer($db_link)
    {
        $sql="SELECT customer_id FROM customer;";
        $result=$db_link->query($sql);
        return $result;
    }
   
   function delete_customer($db_link,$userid)
   {
       $sql="DELETE FROM customer WHERE customer_id='$userid';";
       $db_link->query($sql);
   }
    
   function show_dproductid($db_link)
   {
       $sql="SELECT Model FROM desktop;";
       $result=$db_link->query($sql);
       return $result;   
   }
    
   function update_quan($quan,$model,$db_link)
   {
       $sql="UPDATE desktop SET Amount='$quan' WHERE Model='$model'; ";
       $db_link->query($sql);
   }
   
   function update_store($newstore,$db_link)
   {
       $success=FALSE;
       $sql="INSERT INTO Store(StoreID,Lid,Amount) VALUES('$newstore[0]','$newstore[1]','$newstore[2]'); ";
       $db_link->query($sql);
   }
   
   
   function judge_key($new)
   {
       $ok=TRUE;
       $Lid=(int)$new[0];
       $CPUid=(int)$new[2];
       $GPUid=(int)$new[3];
       $Sid=(int)$new[4];
       $LNid=(int)$new[5];
       if($Lid<=54 and $CPUid>25 and $GPUid>15 and $Sid>10 and $LNid>12)
       {
           $ok=FALSE;
       }
       return $ok;
   }
   
   
   function add_pro($newpro,$db_link)
   {
       $sql="INSERT INTO laptop VALUES('$newpro[0]','$newpro[1]','$newpro[2]','$newpro[3]','$newpro[4]','$newpro[5]','$newpro[6]','$newpro[7]');";
       $db_link->query($sql);
   }
   
   
    
}
