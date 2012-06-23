<?php

class MinzException extends Exception {
	const ERROR = 0;
	const WARNING = 10;
	const NOTICE = 20;

	public function __construct ($message, $code = 0) {
		if ($code != MinzException::ERROR
		 && $code != MinzException::WARNING
		 && $code != MinzException::NOTICE) {
			$code = MinzException::ERROR;
		}
		
		parent::__construct ($message, $code);
	}
}

class FileNotExistException extends MinzException {
	public function __construct ($file_name, $code = 0) {
		$message = 'File doesn\'t exist : `' . $file_name.'`';
		
		parent::__construct ($message, $code);
	}
}
class BadConfigurationException extends MinzException {
	public function __construct ($part_missing, $code = 0) {
		$message = '`' . $part_missing . '` in the configuration file is missing';
		
		parent::__construct ($message, $code);
	}
}
class ControllerNotExistException extends MinzException {
	public function __construct ($controller_name, $code = 0) {
		$message = 'Controller `' . $controller_name . '` doesn\'t exist';
		
		parent::__construct ($message, $code);
	}
}
class ControllerNotActionControllerException extends MinzException {
	public function __construct ($controller_name, $code = 0) {
		$message = 'Controller `' . $controller_name . '` isn\'t instance of ActionController';
		
		parent::__construct ($message, $code);
	}
}
class ActionException extends MinzException {
	public function __construct ($controller_name, $action_name, $code = 0) {
		$message = '`' . $action_name . '` cannot be invoked on `' . $controller_name . '`';
		
		parent::__construct ($message, $code);
	}
}
class SQLConnectionException extends MinzException { }
class RouteNotFoundException extends MinzException { }