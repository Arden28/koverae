<?php


if(!function_exists('current_pos')){
    function current_pos() {

        if (session()->has('current_pos')) {
            // The 'current_pos' session variable is available
            // You can access it like this:
            $currentPos = session('current_pos');

            // Perform actions with $currentPos
            return $currentPos;
        } else {
            // The 'current_pos' session variable is not available
            // $currentPos = [
            //     'id' => 1,
            //     'unique_token' => null,
            // ];
            // return $currentPos;
            return redirect()->route('pos.index', ['subdomain' => current_company()->domain_name]);
            // Handle the case when the session is not active or the variable is not set
        }

    }
}
