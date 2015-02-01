<?php

/**
 * Database model class contianing hard coded data.
 * Will map to database when deployed
 */
 
class Database extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	// Returns welcome message, hardcoded for debug purposes, will be moved to view in final version
	function welcome()
	{
		$str = "<h1>Welcome to Nav Bhatti's Assignment #1 Webapp wireframe</h1>";
		$str .= "<p>This is the assignment 1 submission for 4711. It is meant to be a timekeeping app that allows the user to record times spent on tasks and automatically invoice their client.</p>";
		$str .= "<p>Both pages are 'locked', as in they require a password to access. currently merely pressing submit counts as validation but the appropriate hooks are in place to create a more robust login system</p>";
		$str .= "<p>The data is hard coded into the model database.php currently but will be accessed from a database similar to the structure created by the SQL script in application/data before deployment</p>";
		$str .= "Created files include: <ul>";
		$str .= "<li>core/MY_Controller base controller class</li>";
		$str .= "<li>views/modules/_header.php internal template for header</li>";
		$str .= "<li>views/modules/_footer.php internal template for footer</li>";
		$str .= "<li>views/modules/_validation.php internal template for login form</li>";
		$str .= "<li>Invoice Controller and View</li>";
		$str .= "<li>Timer Controller and View</li>";
		$str .= "<li>models/database.php database model file, this welcome message is coded there for debug purposes</li>";
		$str .= "<ul><br/><br/>";
		return $str;
	}
	
	// Returns array containing all clients
	function all_clients()
	{
		$arr = array();
		array_push( $arr, array( 'id'=>0, 'name'=>"Company A") );
		array_push( $arr, array( 'id'=>1, 'name'=>"Company B") );
		array_push( $arr, array( 'id'=>2, 'name'=>"Company C") );
		return $arr;
	}
	
}