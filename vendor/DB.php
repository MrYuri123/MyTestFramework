<?php
namespace vendor;

include_once "/config/database.php";
require_once "autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

/**
* Class Model use this class for db requests.
* Singleton pattern;
*/
class DB
{
	public function __construct()
	{
		$capsule = new Capsule();
		$capsule->addConnection([
			"driver"    => DB_DRIVER,
			"host"      => DB_HOST,
			"database"  => DB_NAME,
			"username"  => DB_USER,
			"password"  => DB_PASS,
			"charset"   => "utf8",
			"collation" => "utf8_unicode_ci",
			"prefix"    => "",
		]);

		$capsule->bootEloquent();
	}
}
