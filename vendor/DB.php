<?php
namespace vendor;

include_once "/config/database.php";

/**
* Class Model use this class for db requests.
* Singleton pattern;
*/
class DB
{
	private static $_instance = null;

	private function __construct () {

        try {
			$this->_instance = new \PDO(
				'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
		    	DB_USER,
		    	DB_PASS
		    );
		} catch (\PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}

	private function __clone () {}
	private function __wakeup () {}

	public static function getInstance()
	{
		if (self::$_instance != null) {
			return self::$_instance;
		}

		return new self;
	}

    public function query($params)
	{
		return $this->_instance->query($params);
	}

	public function prepare($query)
	{
		return $this->_instance->prepare($query);
	}

	public function execute($statment)
	{
		return $statment->execute();
	}
}
