<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tonkho extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        //load model cuon linh kien
        $this->load->model('Linhkien_model');
        $this->load->model('Linhkienmau');
    }
    public function index() {
        $data = array();
        $data['template'] = "admin/tonkho";
        $data['linhkien'] = $this->getlinhkien();//"admin/tonkho";
        $this->load->view('admin/layout', $data);
    }
     public function getlinhkien() {
        $data = $this->Linhkien_model->get_list();
        return $data;
    }

}
