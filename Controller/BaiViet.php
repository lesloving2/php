<?php
require('Controller/Session.php');

class BaiViet extends BaseController
{
    public $fileUpload = '';
    public function __construct()
    {
        Session::checkSesstion();
        parent::__construct();
    }

    public function ngu()
    {

        if (isset($_POST['ChonCongTy'])) {
            $CongTy = $_POST['ChonCongTy'];
        } else {
            $CongTy = '';
        }
        $adminModel = $this->load->model('AdminModel');
        $fileUploadHinhNen = null;
        $fileUploadLogo = null;
        $tenCongTy = $_POST['Congtymoi'];
        $Email = $_POST['email'];
        $NgayDang = date('Y-m-d', time());
        $ViTri = $_POST['job-title'];
        $Luong = $_POST['job-Luong'];
        $SoLuong = $_POST['job_SoLuong'];
        $KhuVuc = $_POST['Khuvuc'];
        $KinhNghiem = $_POST['job_KinhNghiem'];
        $HinhThuc = $_POST['job-type'];
        $DeadLine = date('Y-m-d', strtotime($_POST['job-deadline']));
        $MoTa = $_POST['quillMota'];
        $MST = $_POST['MST_CongTy'];
        $Web_CongTy = $_POST['Web_CongTy'];
        $MotaCongTy = $_POST['Mota'];
        $DiaChi_CongTy = $_POST['Adress_CongTy'];
        if ($_FILES["company_HinhNen"]['error'] == 0) {
            $file = $_FILES["company_HinhNen"];
            $pathBaiViet = $this->upload($file, "BaiViet");
            $fileUploadHinhNen = $pathBaiViet;
        }

        if ($_FILES["Logo_CongTy"]['error'] == 0) {
            $file = $_FILES["Logo_CongTy"];
            $pathBaiViet2 = $this->upload($file, "Logo");
            $fileUploadLogo = $pathBaiViet2;
        }

        $CtyMoi = array($tenCongTy, $MST, $DiaChi_CongTy, $Web_CongTy, $MotaCongTy, $fileUploadLogo);

        ///Tạo công ty mới 
        if ($CongTy == 'true') {
            $adminModel->addCompany($CtyMoi);
        }
        $Id = $adminModel->getIdCongTy($tenCongTy);
        $BvMoi = array($Id, $NgayDang, $SoLuong, $ViTri, $HinhThuc, $KinhNghiem, $KhuVuc, $Luong, $DeadLine, $MoTa, $fileUploadHinhNen, $Email);
        $adminModel->addBaiViet($BvMoi);
        //echo filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
        //$this->load->view('demo2', $MoTa);
        $msg['msg'] = "Thêm thành công công ty: " . $tenCongTy;
        header("Location:" . BASE_URL . "adminBaiViet/AddBaiViet?msg=" . urldecode(serialize($msg)));
    }

    public function upload($file, $nameFile)
    {

        $file_Tmp = $file["tmp_name"];
        $file_name = $nameFile . "-" . date('d-m-Y', time()) . "-" . $file["name"];
        $target_file = "Uploads/" . $file_name;
        $num = 0;
        while (file_exists($target_file)) {
            $file_name = ltrim($file_name, "(" . $num - 1 . ")");
            $file_name = "(" . $num . ")" . $file_name;
            $target_file = "Uploads/" . $file_name;
            $num++;
        }
        move_uploaded_file($file_Tmp, "Uploads/" . $file_name);
        return $path = "Uploads/" . $file_name;
    }

    function Xoa($id)
    {
        $adminModel = $this->load->model('AdminModel');
        $kq = $adminModel->XoaBaiViet($id);
        if ($kq != 0) {
            $msg['msg'] = "Đã xoá thành công " . $kq;
            header("Location:" . BASE_URL . "adminBaiViet/AllBaiViet?msg=" . urldecode(serialize($msg)));
        } else {
            $msg['msg'] = "Xoá Thất bại " . $kq;
            header("Location:" . BASE_URL . "adminBaiViet/AllBaiViet?msg=" . urldecode(serialize($msg)));
        }
    }

    function Capnhap($id)
    {
        $adminModel = $this->load->model('AdminModel');
        $data = $adminModel->Capnhap($id);
        $this->load->view('admin/header');
        $this->load->view('admin/Menu');
        $this->load->view('admin/BaiViet/Capnhap', $data);
        $this->load->view('admin/footer');
    }

    function Update($id)
    {
        $adminModel = $this->load->model('AdminModel');
        $fileUploadHinhNen = null;
        //List POST bài viết
        $tenCongTy = $_POST['Congtymoi'];
        $Email = $_POST['email'];
        $ViTri = $_POST['job-title'];
        $Luong = $_POST['job-Luong'];
        $SoLuong = $_POST['job_SoLuong'];
        $KhuVuc = $_POST['Khuvuc'];
        $KinhNghiem = $_POST['job_KinhNghiem'];
        $HinhThuc = $_POST['job-type'];
        $DeadLine = date('Y-m-d', strtotime($_POST['job-deadline']));
        $MoTa = $_POST['quillMota'];
        if ($_FILES["company_HinhNen"]['error'] == 0) {
            $file = $_FILES["company_HinhNen"];
            $pathBaiViet = $this->upload($file, "BaiViet");
            $fileUploadHinhNen = $pathBaiViet;
        }
        $BvMoiCapNhap = array($SoLuong, $ViTri, $HinhThuc, $KinhNghiem, $KhuVuc, $Luong, $DeadLine, $MoTa, $fileUploadHinhNen, $Email);
        $kq = $adminModel->Update($BvMoiCapNhap, $id);
        if ($kq != 0) {
            $msg['msg'] = "Cập nhập thành công bài viêt của công ty" . $tenCongTy;
            header("Location:" . BASE_URL . "adminBaiViet/AllBaiViet?msg=" . urldecode(serialize($msg)));
        } else {
            $msg['msg'] = "Cập nhập Thất bại " . $kq;
            header("Location:" . BASE_URL . "adminBaiViet/AllBaiViet?msg=" . urldecode(serialize($msg)));
        }
    }
}
