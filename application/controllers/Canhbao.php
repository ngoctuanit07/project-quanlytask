<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Canhbao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model cuon linh kien
        $this->load->model('Linhkien_model');
        $this->load->model('Kehoach_model');
        $this->load->model('Chithi_model');
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
        $data['template'] = "admin/canhbao";

        $this->load->view('admin/layout', $data);
    }

    public function searchLinhkien() {

        $data = array(
            'ngaysanxuat >=' => $this->input->post('_tungay'),
        );
        $data1 = array(
            'ngaysanxuat <=' => $this->input->post('_denngay'),
        );
        
       // print_r($data); die();

        $ketqua = array();
        $mamodel = array();
        $soluongModel = array();
        if ($data && isset($data)) {
            // $tong = $this->Linhkien_model->get_sum('soluong',$data);
            //  print_r($tong); die();
            $result = $this->Kehoach_model->get_info_rule2($data,$data1);
            foreach ($result as $key => $value){
                $mamodel[$key] = $value->mamodel;
                $soluongModel[$key] = $value->soluong;
                
            }
                print_r($mamodel);
            //    print_r($soluongModel);
           die();
            
           // $soluongmodel = (int)$result->soluong;
            //$mamodel = $result->mamodel;
            
            //$dataChithi = array(
             // 'mamodel' => $mamodel  
            //);
            $malinhkien = array();
            $sodiemgan = array();
            foreach ($mamodel as $key => $value){
                  $chithi = $this->Chithi_model->get_info_rule4(array('mamodel' => $value));
                $malinhkien[$key] = $chithi->malinhkien;
                $sodiemgan[$key] = $chithi->sodiemgan;
               
                 print_r($chithi);
            }
            die();
            print_r($malinhkien); die();
            foreach ($malinhkien as $key => $value){
       
            
                $linhkienModel = $this->Linhkien_model->get_sum('soluong',array(
                    'malinhkien' => $value
                ));
                     print_r($linhkienModel); 
            }
        
            die();
            $chithi = $this->Chithi_model->get_info_rule1($dataChithi);
            
            $malinhkien = $chithi->malinhkien;
            $soluongchithi = (int)$chithi->sodiemgan;
           
           
           // print_r($linhkienModel); die();
            
            $soLuonglinhkien = (int)  $linhkienModel;//$linhkienModel->soluong;
            
            $tongSoluongModelvaDiemgan = $soluongmodel * $soluongchithi;
            
            $soluongsanxuatthieu = '';
            
            if($tongSoluongModelvaDiemgan ===  $soLuonglinhkien){
                $soluongsanxuatdu = $tongSoluongModelvaDiemgan;
                $soluongsanxuatthieu = 0;
            }else{
                $soluongsanxuatdu = $tongSoluongModelvaDiemgan;
                $soluongsanxuatthieu = $soLuonglinhkien - $tongSoluongModelvaDiemgan;
            }
            
           // print_r($soluongsanxuatthieu); die();

            $ketqua['success'] = 'success';
             $ketqua['malinhkien'] = $malinhkien;
            $ketqua['soluongsanxuatdu'] = $soluongsanxuatdu;
            $ketqua['soluongsanxuatthieu'] = $soluongsanxuatthieu;
            echo json_encode($ketqua);
            die();
            //return $result;
        }
    }

}
