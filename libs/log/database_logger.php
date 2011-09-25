<?php
/**
* Database logger
* @author Nick Baker 
* @version 1.0
* @license MIT

# Setup

in app/config/bootstrap.php add the following

CakeLog::config('database', array(
	'engine' => 'DatabaseLogger.DatabaseLogger',
	'model' => 'CustomLogModel' //'DatabaseLogger.Log' by default
));

*/
App::import('Core', 'ClassRegistry');
class DatabaseLogger {
	
	/**
	* Model name placeholder
	*/
	var $model = null;
	
	/**
	* Model object placeholder
	*/
	var $Log = null;
	
	/**
	* Contruct the model class
	*/
	function __construct($options = array()){
		$this->model = isset($options['model']) ? $options['model'] : 'DatabaseLogger.Log';
		$this->Log = ClassRegistry::init($this->model);
	}
	
	/**
	* Write the log to database
	*/
	function write($type, $message){
		$data = array();
		$bt = debug_backtrace();
		
		if (!empty($bt[2]['object']->name)) { $data['class'] = $bt[2]['object']->name; }
		if (!empty($bt[2]['object']->action)) { $data['action'] = $bt[2]['object']->action; }
		if (!empty($bt[2]['object']->data)) { $data['data'] = print_r($bt[2]['object']->data,true); }
		if (!empty($bt[2]['object']->Auth)) { $data['user_id'] = $bt[2]['object']->Auth->User('id'); }
		if (!empty($bt[2]['file'])) { $data['file'] = $bt[2]['file']; }
		if (!empty($bt[2]['line'])) { $data['line'] = $bt[2]['line']; }
		$data['type'] = $type;
		$data['message'] = $message;
		
		$this->Log->save($data);
	}
}
?>
