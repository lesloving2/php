<?php
//include_once('Controller/BaseController.php');
class Index extends BaseController
{
    public $data = array();
    public function __construct()
    {
        parent::__construct();
    }

    public function HomePage()
    {
        $someTable = 'tb_user';
        $indexmodel = $this->load->model('IndexModel');
        $data['array'] = $indexmodel->getAllData($someTable); //lấy toàn bộ data từ indexmodel; thông qua hàm getalldata
        $this->load->view('Home', $data);
    }

    //Index khi select 1 Id nào đó fun GetID

    public function HomePageByID()
    {
        $this->load->view('Someview');
        $model = $this->load->model('somemodel');
        $table = 'tb_user'; // 1 table bất kỳ nào đó


    }
}
