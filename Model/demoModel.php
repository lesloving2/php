<?php

class demoModel extends BaseModel
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

    public function insert($data = array())
    {
        $sql = "INSERT INTO `tb_user`(`Id_User`, `Name_User`, `Pass_User`, `Company_Name`, `Company_Logo`, `Company_Adress`, `Comany_Email`) VALUES ('','$data[0]','$data[1]','[value-4]','[value-5]','[value-6]','[value-7]')";
        $this->db->ExcuteSql($sql);
        return $sql;
    }

    public function login($name, $pass)
    {
        $sql = "SELECT COUNT(*) FROM `tb_user` WHERE `Name_User` = '$name' AND `Pass_User` = '$pass'";
        $kq = $this->db->checkLogin($sql);
        return $kq;
    }

    public function getLogin($name, $pass)
    {
        $sql = "SELECT * FROM `tb_user` WHERE `Name_User` = '$name' AND `Pass_User` = '$pass'";
        $kq = $this->db->getLogin($sql);
        return $kq;
    }
}
