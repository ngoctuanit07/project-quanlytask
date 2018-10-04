<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cuonlinhkien extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model cuon linh kien
        $this->load->model('Linhkienmau');
    }

    public function index() {
        $data = array();
        $data['template'] = 'admin/cuonlinhkien/list';
        $data['linhkien'] = $this->getCuonlinhkien();
        $this->load->view('admin/layout', $data);
    }
    public function getCuonlinhkien(){
        $data = $this->Linhkienmau->get_list();
        return $data;
    }

    public function them() {
        $data = array(
            'malinhkien' => $this->input->post('_macuonlinhkien'),
            'soluong' => $this->input->post('_soluong'),
        );
        $result = array();
        if ($data && is_array($data)) {
            if ($this->Linhkienmau->create($data)) {
                $result['success'] = 'success';
                $result['messeage'] = 'them thanh cong';
                echo json_encode($result);
                die();
            }
        }
    }

}
