<?php

include_once('dbConnect.php');

class Crud extends DbConfig
{
	public function __construct()
	{
		parent::__construct();
    }

    public function execute($query)
    {
        $result = $this->con->query($query);
        
        if($result)
            return $result;
        else
            echo $this->con->error;
    }
}

?>