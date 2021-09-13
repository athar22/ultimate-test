<?php
if($_GET["submit"]!=""){




    global $wpdb;
    $table = $wpdb->prefix.'employee';
    $data =  array(
        'employee_id'=>$_GET['employee_id'],
		'employee_name'=>$_GET['employee_name'],
		'employee_HiringeDate'=>$_GET['employee_date'],
        'Salary'=>$_GET['salary']
    );

    $wpdb->insert($table,$data,$format);
    
}
?>
<div class="wrap">

    <h1 id="testID" class="wp-heading-inline">Add New student</h1>


  <div>

      <form action="<?php echo admin_url( 'admin.php', 'http' ); ?>" method="get">
          <input type="hidden" name="page" value="employeetask">
          <input type="hidden" name="action" value="add">
          <input type="number" name="employee_id" value="" placeholder="student Number">
          <input type="text" name="employee_name" value="" placeholder="student Name">
          <input type="datetime" name="employee_date" value="" placeholder="student HireDate">
          <input type="number" name="salary" value="" placeholder="Salary" step=".01">




          <div>
              <button type="submit" name="submit" value="submit" class="button">ADD</button>

          </div>

      </form>
  </div>
</div>

