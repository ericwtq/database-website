<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of searchSQL
 *
 * @author tianqi
 */
class searchSQL {
    
    function search_desktop_P($cate,$keyword,$db_link)
    {
   
            if($cate==='model')
            {
                
                $sql="SELECT desktop.Model,desktop.Price, cpu.Cmodel FROM desktop,cpu WHERE desktop.CPUid=cpu.Cid AND desktop.Model LIKE '$keyword' ORDER BY desktop.Price;";
                $result=$db_link->query($sql);
                return $result;
            }
            else
            {
                $sql="SELECT desktop.Model,desktop.Price, cpu.Cmodel FROM desktop,cpu WHERE desktop.CPUid=cpu.Cid AND cpu.Cmodel LIKE '$keyword' ORDER BY desktop.Price;";
                $result=$db_link->query($sql);
                return $result;
            }
        
    }       
    
    function search_desktop_s($cate,$keyword,$db_link)
    {
   
            if($cate==='model')
            {
                
                $sql="SELECT desktop.Model,desktop.Price, cpu.Cmodel FROM desktop,cpu WHERE desktop.CPUid=cpu.Cid AND desktop.Model LIKE '$keyword' ORDER BY desktop.sold;";
                $result=$db_link->query($sql);
                return $result;
            }
            else
            {
                $sql="SELECT desktop.Model,desktop.Price, cpu.Cmodel FROM desktop,cpu WHERE desktop.CPUid=cpu.Cid AND cpu.Cmodel LIKE '$keyword' ORDER BY desktop.sold;";
                $result=$db_link->query($sql);
                return $result;
            }
        
    }       
    
    
    
    
            
    function search_laptop_s($cate,$keyword,$db_link)        
    {
     
            if($cate==='model')
            {
                $sql="SELECT laptop.Model,laptop.Price, cpu.Cmodel FROM laptop,cpu WHERE laptop.CPUid=cpu.Cid AND laptop.Model LIKE '$keyword' ORDER BY laptop.sold;";
                $result=$db_link->query($sql);
                return $result;
            }
            else
            {
                $sql="SELECT laptop.Model,laptop.Price, cpu.Cmodel FROM laptop,cpu WHERE laptop.CPUid=cpu.Cid AND cpu.Cmodel LIKE '$keyword' ORDER BY laptop.sold;";
                $result=$db_link->query($sql);
                return $result;
            }
    }
        
    
    function search_laptop_P($cate,$keyword,$db_link)        
    {
     
            if($cate==='model')
            {
                $sql="SELECT laptop.Model,laptop.Price, cpu.Cmodel FROM laptop,cpu WHERE laptop.CPUid=cpu.Cid AND laptop.Model LIKE '$keyword' ORDER BY laptop.Price;";
                $result=$db_link->query($sql);
                return $result;
            }
            else
            {
                $sql="SELECT laptop.Model,laptop.Price, cpu.Cmodel FROM laptop,cpu WHERE laptop.CPUid=cpu.Cid AND cpu.Cmodel LIKE '$keyword' ORDER BY laptop.Price;";
                $result=$db_link->query($sql);
                return $result;
            }
    }
    
    
    
    
    /**
     function searchl_cpu($cpu,$db_link)
    {
        $query="SELECT Model,Price FROM laptop,cpu WHERE laptop.CPUid=cpu.Cid AND cpu.Model=$cpu";
        $result2=mysqli_query($db_link, $query);
        return $result2;
    }
     * 
     */
}
