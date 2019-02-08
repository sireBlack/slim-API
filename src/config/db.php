<?php

class db
{
    //Properties

    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $dbpassword = '';
    private $dbname = 'vCustomer';

    public function connect()
    {
        $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
        $dbconnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpassword);

        $dbconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbconnection;
    }

 }