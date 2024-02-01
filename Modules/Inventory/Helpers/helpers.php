<?php

if (!function_exists('storage_locations')) {
    function storage_locations() {
            return true;
    }
}

if (!function_exists('location_name')) {
    function location_name($location) {
        if($location->parent){
            return $location->parent->name.'/'.$location->name;
        }else{
            return $location->name;
        }
    }
}
