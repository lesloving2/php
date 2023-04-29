<?php
require('Controller/Session.php');
class Login extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        //Session::checkSesstion();
    }
    public function checklogin()
    {
        Session::runSession();
        //Nếu người dùng gõ trên url là login thì kiểm tra đăng nhập
        if (Session::getSesion('login') == true) {
            header("Location:" . BASE_URL . "login/dashboard");
        } else {
            $LoginModel = $this->load->model('LoginModel');
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
            } else
                $name = 'ngu';

            if (isset($_POST['pass'])) {
                $pass = ($_POST['pass']);
                //$pass = md5($_POST['pass']);
            } else
                $pass = 'ngu';
            $KQ = $LoginModel->login($name, $pass);
            if ($KQ == 1) {
                $ngu2 = $LoginModel->getLogin($name, $pass);
                //Tạo sesstion của user hoặc admin ở đây. có thể tạo 1 sesstion mới riêng cho admin.
                Session::runSession();
                Session::setSession('login', true);
                Session::setSession('name', $ngu2[0]['Name_User']);
                Session::setSession('nameId', $ngu2[0]['Id_User']);
                header("Location:" . BASE_URL . "login/dashboard");
            } else {
                $msg['msg'] = "sai mật KHẩu hoặc tài khoản";
                header("Location:" . BASE_URL . "login/login?msg=" . urldecode(serialize($msg)));
            }
        }
    }

    //Khi ấn vào đăng xuất sẽ trỏ đến hàm này và bùm về trang đăng nhập.
    public function Logout()
    {
        Session::runSession();
        Session::quitSession();
        header("Location:" . BASE_URL . "login/login");
    }

    public function dashboard()
    {
        $company = array();
        $adminmodel = $this->load->model("AdminModel");
        $company = $adminmodel->getAllData();
        $encoded_data = json_encode($company, JSON_UNESCAPED_UNICODE);
        file_put_contents('company.json', $encoded_data);
        //check sesstion của tài khoản admin ở đây để vào trang admin
        Session::checkSesstion();
        //Session::setSession('Login', true);
        $this->load->view('admin/header');
        $this->load->view('admin/Menu');
        $this->load->view('admin/Dashboard');
        $this->load->view('admin/footer');
    }

    public function login()
    {
        Session::runSession();
        if (Session::getSesion('login') == true) {
            header("Location:" . BASE_URL . "login/dashboard");
        } else {
            $this->load->view('Layouts/Header');
            $this->load->view('Login');
            $this->load->view('Layouts/footer');
        }
    }

    public function Reg()
    {
    }
}
