<?php

class DataBase
{
    public $host	 = 'localhost';
    public $username = 'root';
    public $password = '';
    public $database = 'book_list';
    public $result;

    function __construct()
	{
        $this->sql_connect();
        $this->sql_database();
        $this->set_db_encode();
    }

    function sql_connect()
	{
        return mysql_connect($this->host, $this->username, $this->password);
    }

    function sql_database()
	{
        return mysql_select_db($this->database);
    }

    function set_db_encode()
	{
        return mysql_query("SET NAMES 'utf8'");
    }

    function query($sql_string)
	{
        $result = mysql_query($sql_string);
        $query  = new DatabasebQuery($result);
		$result = $query->result();
        return $result;
    }

}

class DatabasebQuery
{
    private $result;
    
    function __construct($result)
	{
        $this->result = $result;
    }

    function result()
	{
        $query = array();
        if ($this->result != false) {
            while ($row = mysql_fetch_object($this->result) ) {
                $query[] = $row;
            }
            return $query;
        }
        return false;
    }
}
