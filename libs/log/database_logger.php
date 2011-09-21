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
		
		if(is_array($message)) {
			if(is_object($message[0])) {
				$obj = $message[0];
				$data['class'] = $obj->name;
				$data['action'] = $obj->action;
				$data['data'] = print_r($obj->data,true);
				$data['user_id'] = $obj->Auth->User('id');
				$data['message'] = $message[1];
			}
		} else {
			$data['type'] = $type;
			$data['message'] = $message;
		}
		
		$this->Log->save($data);
	}
}
?>
