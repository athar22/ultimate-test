<?php

/**
 * Plugin Name: test
 
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Your Name
 
 */
 
 include(plugin_dir_path(__FILE__).'api/api.php');
 class employeetask

    {

        function register(){
            add_action('admin_menu', array($this,'employee_menu'));

        }
        public function employee_menu() {
            add_menu_page('employeetask', 'employeetask', 'manage_options', 'employeetask', array($this,'form'));
        }

        public function form(){

            require_once plugin_dir_path(__FILE__).'template/employeetask.php';

        }
		
		
		public static function activate() {

         
            global $wpdb;
            $table_name = $wpdb->prefix . "employee";
             global $employeeDbVerstion;
			 $employeeDbVerstion="1.4";
            $creattable = "CREATE TABLE IF NOT EXISTS " .$table_name. " (
			     
                employee_id int(11) NOT NULL PRIMARY KEY,
                employee_name varchar(255)  ,
                employee_HiringeDate  DATETIME  ,
                Salary float 
               
	        ) ";
             require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

            dbDelta( $creattable);


            add_option("myVerstion",$employeeDbVerstion);
            

        }
		public static function deactivate() {



        }
	}
	//creat instance
	$employee= new employeetask();
	$employee->register();
	
	
	register_activation_hook(__FILE__, array($employee,'activate'));



register_deactivation_hook(__FILE__, array($employee,'deactivate'));
