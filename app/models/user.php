<?php


class userModel
{
    private $conn;

    public function __construct()
    {
        include 'app/controllers/config.php';
        $dbConnection;
        $this->conn = $dbConnection;
    }

}