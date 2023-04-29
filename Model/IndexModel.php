<?php

class IndexModel extends BaseModel
{


    public function __construct()
    {
        parent::__construct();
    }


    public function getAllData($SomeTable)
    {
        return  $this->db->select($SomeTable);
        //$query = $query->fetchAll();
    }

    public function getById($table, $id)
    {
    }

    public function insert($data)
    {
        $sql = "";
    }
}
