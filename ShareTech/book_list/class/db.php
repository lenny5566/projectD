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
        return $query;
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

$DB = new DataBase;

class pages
{	
	public $page_out = false; //測試印出
	public $per = 16; //每頁顯示數量
	public $data_nums = 0; //總筆數
	public $page = 0; //現在頁數
	public $pages = 0; //總頁數
	
    function __construct()
	{
		
    }
	
    function Page($sql_string)
	{
		$sql = $sql_string;
		$result = mysql_query($sql);

		$data_nums = mysql_num_rows($result); //統計總比數
		$per = $this->per; //每頁顯示項目數量
		$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
		
		if (!isset($_GET["page"])){
			$page=1;
		} else {
			$page = intval($_GET["page"] + 0);
		}
		
		$start = ($page-1)*$per; //每一頁開始的資料序號
		$sql = $sql.' LIMIT '.$start.', '.$per;
		$result = mysql_query($sql) or die("Error");
		//$This
		$this->data_nums = $data_nums;
		$this->page = $page;
		$this->pages = $pages;
		if (($this->page_out == true)) {
			//分頁頁碼
			$front = $page-1;
			$next  = $page+1;
			echo "<br /><a href=?page=1> |< </a> ";
			echo "<a href=?page=".$front."> << </a> ";
			echo "第 <a href=?page=".$page.">".$page."</a> 頁";
			echo "<a href=?page=".$next."> >> </a> ";
			echo "<a href=?page=".$pages."> >| </a><br /><br />";
		}
		$this->data_nums = $data_nums;
		$this->page = $page;
		$this->pages = $pages;

        $query = new DatabasebQuery($result);
		$result = $query->result();
        return $result;
    }
}
