<?php

class Database
{
    private $server_name    = "localhost";
    private $username       = "root";
    private $password       = ""; //for mac or MAMP password is "root"
    private $db_name        = "db_company";
    protected $conn;

    public function __construct()
    {
        // make a connection, $conn will become an object of mysqli which will connect to the database
        $this->conn = new mysqli(
            $this->server_name,
            $this->username,
            $this->password,
            $this->db_name
        );

        //will check if the connection is NOT successsful, if true, will display MySQL error 
        if ($this->conn->connect_error) {
            die("Unable to connect to the database: " . $this->conn->connect_error);
        }
    }
}
