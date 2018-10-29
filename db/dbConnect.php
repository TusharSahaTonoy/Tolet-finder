<?php
class DbConfig 
{	
	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $database = 'tolet_finder_db';
	
	protected $con;
	
	public function __construct()
	{
		if (!isset($this->con)) {
			
			$this->con = new mysqli($this->host, $this->username, $this->password, $this->database);
			
			if (!$this->con)
			{
				 echo $this->con->connect_error;
				exit;
			}
		}	
		return $this->con;
	}
}


?>