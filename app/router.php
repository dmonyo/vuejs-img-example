<?php  

/**
 * Application router class
 * 
 * */

class Router{


	/**
	 * Call the corresponding action according url params
	 * Params coming from $_GET request
	 * */

	public static function direct() {
		if (isset($_GET['c']) && isset($_GET['a'])) {
		    $controller = ucwords($_GET['c']);
		    $action     = ucwords($_GET['a']);
	  	} else {
	  		//Set default controller and action
		    $controller = 'Main';
		    $action     = 'Home';
	  	}
	  	
	  	(new $controller)->$action();
	}

}