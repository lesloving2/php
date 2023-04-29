<?php
class AdminModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM `tb_congty`";
        return $this->db->ExcuteSqlWithReturn($sql);
    }

    public function getIdCongTy($nameCongTy)
    {
        $Id = array();
        $sql = "SELECT IdCongTy FROM tb_congty WHERE TenCongTy = '$nameCongTy'";
        $Id = $this->db->ExcuteSqlWithReturn($sql);
        return $Id[0]['IdCongTy'];
        //return $this->db->ExcuteSqlWithReturn($sql);;
    }

    public function addCompany($array)
    {
        $sql = "INSERT INTO tb_congty (`TenCongTy`, `MSThue`, `DiaChi`, `Website`, `MoTa`, `Logo`) VALUES ('$array[0]','$array[1]','$array[2]','$array[3]','$array[4]','$array[5]')";
        $this->db->ExcuteSql($sql);
    }

    public function addBaiViet($array)
    {
        $sql = "INSERT INTO tb_baiviet (`IdCongTy`, `NgayDang`, `SoLuong`, `ViTri`, `HinhThuc`, `KinhNghiem`, `DiaChiLamViec`, `Luong`, `HanNop`, `MoTa`, `Image`, `Email`) VALUES ('$array[0]','$array[1]','$array[2]','$array[3]','$array[4]','$array[5]','$array[6]','$array[7]','$array[8]','$array[9]','$array[10]','$array[11]')";
        return $this->db->ExcuteSqlLog($sql);
    }

    public function selectBaiViet()
    {
        $sql = "SELECT bv.IdBaiViet,ct.TenCongTy,ct.Logo ,bv.NgayDang,bv.SoLuong,bv.ViTri,bv.HinhThuc,bv.KinhNghiem,bv.DiaChiLamViec,bv.Luong,bv.HanNop,bv.Email,bv.MoTa,bv.Image FROM `tb_baiviet` AS bv\n"

            . "inner JOIN `tb_congty` AS ct on bv.IdCongTy = ct.IdCongTy;";
        return $this->db->ExcuteSqlWithReturn($sql);
    }

    public function XoaBaiViet($id)
    {
        $sql = "DELETE FROM `tb_baiviet` WHERE `IdBaiViet` = $id";
        return $this->db->ExcuteSqlLog($sql);
    }

    public function CapNhap($id)
    {
        $sql = "SELECT bv.IdBaiViet,ct.TenCongTy,bv.NgayDang,bv.SoLuong,bv.ViTri,bv.HinhThuc,bv.KinhNghiem,bv.DiaChiLamViec,bv.Luong,bv.HanNop,bv.Email,bv.MoTa,bv.Image FROM `tb_baiviet` AS bv inner JOIN `tb_congty` AS ct on bv.IdCongTy = ct.IdCongTy WHERE `IdBaiViet` = $id";
        return $this->db->ExcuteSqlWithReturn($sql);
    }

    public function Update($array, $id)
    {
        $sql = "UPDATE `tb_baiviet` SET `SoLuong`='$array[0]',`ViTri`='$array[1]',`HinhThuc`='$array[2]',`KinhNghiem`='$array[3]',`DiaChiLamViec`='$array[4]',`Luong`='$array[5]',`HanNop`='$array[6]',`MoTa`='$array[7]',`Image`='$array[8]',`Email`='$array[9]' WHERE `IdBaiViet` = '$id'";
        return $this->db->ExcuteSqlLog($sql);
    }
}
