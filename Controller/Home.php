<?php
require('Controller/Session.php');
class Home extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->view('Layouts/Header');
        $this->load->view('Layouts/NavBar');
        $this->load->view('Layouts/footer');
    }
}
