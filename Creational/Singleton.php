<?php

namespace DesignPattern\Creational;

/**
 * Singleton class implement singleton design pattern concept which restricts 
 * to instantiate one object from a class(through site pages).
 * @package DesignPattern \Creational
 * @author Mohamed Faesal mohamed.feasal@gmail.com
 */
class Singleton 
{
	/**
	 * @var Singleton instance that hold a single object of Singleton class
	 */
	private static $instance;

	/**
	 * @var string test variable to test this class as a singleton
	 */
	public $testVariable ;

	/**
	 * this function to return a single instance of Singleton class
	 * @return Singleton instance of Singleton class
	 */
	public static function getInstance() : Singleton
	{
		// check if session already start or not
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		static::$instance = isset($_SESSION['singleton']) ? $_SESSION['singleton'] : null;
		if (!static::$instance || !(static::$instance instanceof Singleton)) {
			$_SESSION['singleton'] = new Singleton();
			static::$instance 	   = $_SESSION['singleton'];
		}
		return static::$instance;
	}

	/**
	 * Singleton constructor.
	 */
    private function __construct()
    {
    }
    
    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     * @return void
     */
    private function __wakeup()
    {
    }
}

/**
 * singleton object will be created one time and every time you tried to another one
 * this object will return to you as the same
 */
$instance = Singleton::getInstance();
$instance->testVariable = "This is a singleton object.";

$newInstance = Singleton::getInstance();
echo $newInstance->testVariable;
?>