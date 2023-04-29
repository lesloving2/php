<?php
class LoginModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCompany()
    {
        $sql = "SELECT `IdCongTy`, `TenCongTy` FROM `tb_congty`";
        return $this->db->ExcuteSqlWithReturn($sql);
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM `tb_congty`";
        return $this->db->ExcuteSqlWithReturn($sql);
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
