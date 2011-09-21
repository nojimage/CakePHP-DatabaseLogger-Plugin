<?php 
/* database_logger schema generated on: 2011-09-20 18:24:33 : 1316568273*/
class database_loggerSchema extends CakeSchema {
	var $name = 'database_logger';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $logs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'class' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'action' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'data' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'ip' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'httpcode' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'hostname' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'uri' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'refer' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'message' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB')
	);
}
?>
