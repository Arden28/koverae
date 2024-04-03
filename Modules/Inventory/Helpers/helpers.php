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

if (!function_exists('transfer_type')) {
    function transfer_type($type) {
        $name = '';
        if($type == 'receipt'){
            $name = 'Réception';
        }elseif($type == 'delivery'){
            $name = 'Livraisons';
        }elseif($type == 'internal_transfer'){
            $name = 'Transferts Internes';
        }elseif($type == 'manufacturing'){
            $name = 'Productions';
        }
        return $name;
    }
}
