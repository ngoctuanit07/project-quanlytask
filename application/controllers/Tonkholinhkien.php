<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tonkholinhkien extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model cuon linh kien
        $this->load->model('Linhkien_model');
        $this->load->model('Linhkienmau');
    }

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
    public function index() {
        $data = array();
        $data['template'] = "admin/tonkholinhkien";
         
        $this->load->view('admin/layout', $data);
    }
    


    public function searchLinhkien() {

        $data = array(
            'malinhkien' => $this->input->post('_macuonlinhkien'),
        );
   
        $ketqua = array();
        if ($data && isset($data)) {
            $tong = $this->Linhkien_model->get_sum('soluong',$data);
          //  print_r($tong); die();
            $result = $this->Linhkien_model->get_info_rule1($data);
  
            $ketqua['success'] = 'success';
            $ketqua['message'] = $result;
               $ketqua['tong'] =  $tong ;
            
            echo json_encode($ketqua);die();
            //return $result;
           
        }
    }

}
