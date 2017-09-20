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

class pages
{	
	public $page_out = false;
	public $per = 16; //每頁顯示數量
	public $data_nums = 0; //總筆數
	public $page = 0; //現在頁數
	public $pages = 0; //總頁數
	
    function __construct()
	{
		
    }
	
    function Page($sorttype, $l)
	{
		if ($l == 0) {
			$sort = 'ASC';
		} else {
			$sort = 'DESC';
		}
		
		$result = mysql_query('SELECT * FROM book');
		$data_nums = mysql_num_rows($result); //統計總筆數
		$per = $this->per; //每頁顯示項目數量
		$pages = ceil($data_nums/$per); //取得不小於值的下一個整數

		if (!isset($_GET["page"]) ) {
			$page = 1;
		} else {
			$page = intval($_GET["page"] + 0);
		}

		$start = ($page-1)*$per; //每一頁開始的資料序號
		$sql = 'SELECT * FROM (SELECT * FROM book LIMIT '.$start.', '.$per.') t
				ORDER BY '.$sorttype.' '.$sort;
		$this->data_nums = $data_nums;
		$this->page = $page;
		$this->pages = $pages;
		if (($this->page_out == true) ) {
			//分頁頁碼
			if ($page == 1) {
				$front = $page;
			} else {
				$front = $page-1;
			}
			if ($page == $pages) {
				$next  = $page;
			} else {
				$next  = $page+1;
			}
			echo "<a href=?page=1> |< </a> ";
			echo "<a href=?page=".$front."> << </a> ";
			echo "第 ".$page." 頁";
			echo "<a href=?page=".$next."> >> </a> ";
			echo "<a href=?page=".$pages."> >| </a><br /><br />";
		}
		return $sql;
    }
}
