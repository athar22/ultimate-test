<?php

global $wpdb;
if($_GET["submit"]!=""){

    $table = $wpdb->prefix.'employee';
    $data =  array(
        'employee_name'=>$_GET['employee_name'],
		'employee_HiringeDate'=>$_GET['employee_date'],
        'Salary'=>$_GET['salary']
    );


    $updated=$wpdb->update($table,$data,array('employee_id' => $_GET['postid']),$format);




}


$results = $wpdb->get_results( "SELECT * FROM wp_employee WHERE employee_id= ".$_GET['postid']);

foreach($results as $result){

}


?>



  <div>

      <form action="<?php echo admin_url( 'admin.php', 'http' ); ?>" method="get">
          <input type="hidden" name="page" value="employeetask">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" name="postid" value="<?php echo $_GET['postid']?>">
		  <input type="text" name="employee_name" value="<?php if($_GET['employee_name']!=''){echo $_GET['employee_name'];}else{ echo $result->employee_name;}?>">
          <input type="datetime" name="employee_date" value="<?php if($_GET['employee_date']!=''){echo $_GET['employee_date'];}else{ echo $result->employee_HiringeDate;}?>" placeholder="student HireDate">
          <input type="number" name="salary" value="<?php if($_GET['salary']!=''){echo $_GET['salary'];}else{ echo $result->Salary;}?>" placeholder="Salary" step=".01">

          <div>
              <button type="submit" name="submit" value="submit" class="button">UPDATE</button>

          </div>

      </form>
  </div>

