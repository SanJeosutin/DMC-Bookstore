<?php
//  AUTHOR: Justin San ********
//  DATE:   01-Jun-2020
//  CONT:   Used for basic functions for the form
    function clean_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function get_array_keyVal($arr){
        $items = array();
        for($count = 0; $count < count($arr); $count+=1){
            $itemsTemp = array($arr[$count] => $arr[$count+=1]);
            array_push($items, $itemsTemp);
        }
        return $items;
    }
?>