<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of buyinfo
 *
 * @author tianqi
 */
class buyinfo {
    //put your code here
    var$product_id, $quantity, $amount, $order_id, $price;
    function get_orderid()
    {
        return $order_id;
    }
    function get_productid()
    {
        return $product_id;
    }
    function get_quantity()
    {
        return $quantity;
    }
    function get_price()
    {
        return $price;
    }
    function get_amount()
    {
        return $amount;
    }
    function set_orderid($id)
    {
        $this->order_id=$id;
    }
    function set_productid($id)
    {
        $this->product_id=$id;
    }
    function set_price($price)
    {
        $this->price=$price;
    }
    function set_amount()
    {
        $amount=$price*$quantity;
    }
    function set_quantity($quantity)
    {
        $this->quantity=$quantity;
    }
}
