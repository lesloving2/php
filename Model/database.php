<?php
class database extends PDO
{
    //const username = "root"; // Khai báo username
    //const password = ""; // Khai báo password
    //const server = "localhost"; // Khai báo server
    // const dbname = "test"; // Khai báo database


    function __construct($connect, $username, $pass)
    {
        parent::__construct($connect, $username, $pass);
        //$db = new PDO($connect,$username,$pass);
    }

    public function select($table)
    {
        $sql = "SELECT * FROM $table ";
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function selectByID($table, $Id)
    {
        $sql = "SELECT * FROM $table WHERE Id = $Id";
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function ExcuteSql($sql)
    {
        $statement = $this->prepare($sql);
        $statement->execute();
        //return $statement->fetchAll(); 
    }
    public function checkLogin($sql)
    {
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->fetchColumn();
    }

    public function ExcuteSqlWithReturn($sql)
    {
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getLogin($sql)
    {
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //Trả về số row bị ảnh hưởng
    public function ExcuteSqlLog($sql)
    {
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->rowCount();
    }

    //public function update($table, $data, $cond)
}
