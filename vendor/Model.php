<?php
namespace vendor;

use vendor\DB;
/**
 * Main Model class
 * // TODO: implement Active Record pattern
 * // TODO: add exception for empty request result
 */
class Model
{
	//Instance of database PDO;
    private $_DB;

	// The name of the table the model works with;
	private $_tableName;

	//Array of all columns in the table;
	private $_columns;

	public function __construct ()
	{
		//// TODO: Use table depending on model name
		$this->_tableName = get_class($this);
		$this->_DB = DB::getInstance();

        //Add property for each table column
		$columns = $this->_DB->query("SHOW COLUMNS FROM album");
		foreach ($columns as $column) {
			$this->_columns[] = $column['Field'];
			$this->$column['Field'] = $column['Field'];
		}
	}

    //Return array where at least one column == $param;
	public function find($param)
	{
		$result = [];
		foreach ($this->_columns as $column) {
			$query = "SELECT * FROM `album` WHERE `$column`= '$param'";
			$queryResult = $this->_DB->query($query);

			foreach ($queryResult as $item){
				foreach($item as $key => $value){
					if (in_array($key, $this->_columns, true)){
						$requestArray[$key] = $value;
					}
				}
				$result[] = $requestArray;
			}
		}
		return $result;
	}

	//Return array for simple "WHERE" request;
	// TODO: Add possibility for "and", "or" requests;
	public function findWhere($param, $searchColumn = null)
	{
		$result = [];
        if ($searchColumn === null){
			$key = key($param);
			$query = "SELECT * FROM `album` WHERE `$key` = '$param[$key]'";
			$queryResult = $this->_DB->query($query);

			foreach ($queryResult as $key => $value){
				$result[$key] = $value;
			}
		} else {

		}
		return $result;
	}
}
