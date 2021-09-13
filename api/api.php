<?php

add_action('rest_api_init',function(){
    register_rest_route('athar/test','employers',[
        'methods'  => 'GET',
        'callback' => 'GETemployeesTable'

    ]);
});


function GETemployeesTable(){
    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM wp_employee");
    $results=json_encode($results);
    $results=json_decode($results);
   return $results;
}
?>