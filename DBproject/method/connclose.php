<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connclose
 *
 * @author tianqi
 */
class connclose {
    //put your code here
    var $mysql_link;
    function db_connect($dbname)
    {
        $mysql_link=new mysqli('127.0.0.1','root','',$dbname);
        if ($mysql_link->connect_errno) 
        {
            echo "Failed to connect to MySQL: (" . $mysql_link->connect_errno . ") " . $mysql_link->connect_error;
        }
        return $mysql_link;
    }
    
    function connect_close($db_link)
    {
    mysqli_close($db_link);
    }
}
