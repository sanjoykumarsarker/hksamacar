<?php
class Database
{
    private $host;
    private $user;
    private $pass;
    private $db;
    public $mysqli;

    public function __construct()
    {
        $this->db_connect();
    }

    private function db_connect()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = 'jps01915876543';
        $this->db = 'sanpro_diksa';

        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        return $this->mysqli;
    }

    public function getRow($query)
    {
        $res = $this->mysqli->query($query);
        return $res->fetch_row();
    }
}

?>