<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userinfo
 *
 * @author tianqi
 */
class userinfo {
    //put your code here
    var $customer_id,$passkey, $city, $customer_name, $state, $zipcode, $street, $gender;
    function get_id()
    {
        return $customer_id;
    }
    function get_passkey()
    {
        return $passkey;
    }
    function get_city()
    {
        return $city;
    }
    function get_name()
    {
        return $customer_name;
    }
    function get_state()
    {
        return $state;
    }
    function get_zipcode()
    {
        return $zipcode;
    }
    function get_street()
    {
        return $street;
    }
    function get_gender()
    {
        return $gender;
    }
    function set_gender($gender)
    {
        $this->gender=$gender;
    }
    function set_id($id)
    {
        $this->customer_id=$id;
    }
    function set_passkey($password)
    {
        $this->passkey=$password;
    }
    function set_city($city)
    {
        $this->city=$city;
    }
    function set_street($street)
    {
        $this->street=$street;
    }
    function set_zipcode($zipcode)
    {
        $this->zipcode=$zipcode;
    }
    function set_state($state)
    {
        $this->state=$state;
    }
    function set_name($name)
    {
        $this->customer_name=$name;
    }
      
}
