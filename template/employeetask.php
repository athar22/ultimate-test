<?php

global $wpdb;
if($_GET["action"]=="delete"){
$table = $wpdb->prefix.'employee';
$delete_id=$wpdb->delete( $table, array( 'employee_id' => $_GET['postid'] ) );
$page= admin_url( 'admin.php?page=employeetask', 'http' );

?>
    
    <a href="<?php echo admin_url( 'admin.php?page=employeetask', 'http' ); ?>">Back to employees</a>
    <?php


}
elseif($_GET["action"]=="remove"){
    $table = $wpdb->prefix.'employee';
    $delete = $wpdb->query("TRUNCATE TABLE wp_employee");
    if($delete!=""){
        ?>
        <h1>DONE</h1>
        <a href="<?php echo admin_url( 'admin.php?page=employeetask', 'http' ); ?>">Back </a>
        <?php
    }
}
elseif($_GET["action"]=="add"){
    require_once plugin_dir_path(__FILE__).'addemployee.php';
}
elseif($_GET["action"]=="edit"){
    require_once plugin_dir_path(__FILE__).'editemployee.php';
}

elseif($_GET["action"]=="addapi"){
    require_once plugin_dir_path(__FILE__).'addapi.php';
}
else{

    $employees_results = $wpdb->get_results( "SELECT * FROM wp_employee");

    ?>

    <div class="wrap">
    <h1 id="testID" class="wp-heading-inline">employeeTable</h1>
    <a href="<?php echo admin_url( 'admin.php?page=employeetask&action=add', 'http' ); ?>" class="page-title-action">
        Add employee
    </a>

    <a href="<?php echo admin_url( 'admin.php?page=employeetask&action=addapi', 'http' ); ?>" class="page-title-action">
        add api
    </a>
    <a href="<?php echo admin_url( 'admin.php?page=employeetask&action=remove', 'http' ); ?>" class="page-title-action">
        Delete All
    </a>
    <div class="container" >
        <table class="wp-list-table widefat  striped table-view-list pages">
            <thead>
            <tr>
                
                <td id="cb" class="manage-column column-cb ">
                    <span>EMP Name</span>
                </td>
                <td id="cb" class="manage-column column-cb ">
                    <span>EMP HireDate</span>
                </td>

                <td id="cb" class="manage-column column-cb ">
                    <span>Salary</span>
                </td>
                <td id="cb" class="manage-column column-cb ">
                    <span>Action </span>
                </td>


            </tr>
            </thead>
            <tbody id="the-list">
            <?php foreach($employees_results as $employee_result){
                ?>
                <tr id="post-7" class="iedit author-self level-0 post-7 type-page status-publish hentry">
                    
                    <td class="author column-author" >
                        <?php echo $employee_result->employee_name?>
                    </td>
                    <td class="author column-author" >
                        <?php echo $employee_result->employee_HiringeDate?>
                    </td>
                    <td class="author column-author" >
                        <?php echo $employee_result->Salary?>
                    </td>

                    <td class="author column-author" >
                    <span>
                        <a href="<?php echo admin_url( 'admin.php?page=employeetask&action=edit', 'http' ).'&postid='.$employee_result->employee_id; ?>">Edit</a>
                    </span>
                        <span>
                        <a href="<?php echo admin_url( 'admin.php?page=employeetask&action=delete', 'http' ).'&postid='.$employee_result->employee_id; ?>">Delete</a>
                    </span>
                    </td>


                </tr>
            <?php }?>
            </tbody>

        </table>
    </div>

<?php }
?>
</div>