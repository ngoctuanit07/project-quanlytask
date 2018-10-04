<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kehoach extends CI_Controller {

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
        $this->load->model('Kehoach_model');
        $this->load->model('Linhkienmau');
    }

    public function index() {
        $data = array();
        $data['template'] = "admin/kehoachsanxuat/list";
        $data['kehoachsanxuat'] = $this->getlist();
        $this->load->view('admin/layout', $data);
    }

    public function themkehoach() {
        $data = array();
        $data['template'] = "admin/kehoachsanxuat/themkehoach";
        //  $data['kehoachsanxuat'] = $this->getlist();
        $this->load->view('admin/layout', $data);
    }

    public function getlist() {
        $data = $this->Kehoach_model->get_list();
        return $data;
    }

    public function them() {
        $data = array(
            'mamodel' => $this->input->post('mamodel'),
            'lotsanxuat' => $this->input->post('lotsanxuat'),
              'ngaysanxuat' => $this->input->post('ngaysanxuat'),
            'soluong' => $this->input->post('soluong'),
        );
       
        $result = array();
        if ($data && is_array($data)) {
            if ($this->Kehoach_model->create($data)) {
                 redirect(admin_url('kehoach'));
            }
        }
    }

}
