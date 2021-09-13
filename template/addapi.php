<?php
$reslts=wp_remote_get('https://ultimate-demos.com/task/wp-json/app/employers');

$reslts=$reslts["body"];
$reslts=json_decode($reslts, true);
$arrayemployess="";
foreach ($reslts as $reslt){
    if(is_array($reslt)){
        $arrayemployess=$reslt;

    }

}

foreach ($arrayemployess as $arrayemploye){
    global $wpdb;
    $table = $wpdb->prefix.'employee';
    $data =  array(
        'employee_id'=>$arrayemploye['employerNumber'],
        'employee_name'=>$arrayemploye['employerName'],
        'employee_HiringeDate'=>$arrayemploye['employerDate'],
        'Salary'=>""
    );

    $wpdb->insert($table,$data,$format);
    
}

?>
<h1>DONE</h1>
<a href="<?php echo admin_url( 'admin.php?page=employeetask', 'http' ); ?>">Back </a>
