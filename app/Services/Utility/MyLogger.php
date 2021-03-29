<?php

namespace App\Services\Utility;

use Monolog\Logger;
use Monolog\Handler\LogglyHandler;

class MyLogger {
	private static $logger = null;
	
	static function getLogger() {
		if (self::$logger == null) {
			self::$logger = new Logger('playLaravel');
			self::$logger->pushHandler(new LogglyHandler('15ab0471-439c-44bd-bb53-352c731962ce/tag/apache,production/', Logger::DEBUG));
		}
		return self::$logger;
	}
	
	public static function debug($message, $data=array()) {
		self::getLogger()->addDebug($message, $data);
	}
	
	public static function info($message, $data=array()) {
		self::getLogger()->addInfo($message, $data);
	}
	
	public static function warning($message, $data=array()) {
		self::getLogger()->addWarning($message, $data);
	}
	
	public static function error($message, $data=array()) {
		self::getLogger()->addError($message, $data);
	}
}

