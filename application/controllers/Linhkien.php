<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Linhkien extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model cuon linh kien
        $this->load->model('Linhkien_model');
        $this->load->model('Linhkienmau');
    }

    public function index() {
        $data = array();
        $data['linhkien'] = $this->getlinhkien();
        $data['template'] = 'admin/linhkien/list';
        $this->load->view('admin/layout', $data);
    }

    public function getlinhkien() {
        $data = $this->Linhkien_model->get_list();
        return $data;
    }

    public function getEditlinhkien($id) {
        $data = $this->Linhkien_model->get_info($id);
        return $data;
    }

    public function getCuonlinhkien() {
        $data = $this->Linhkienmau->get_list();
        return $data;
    }

    public function chiaLinhkien() {
        $data = array();
        $data['linhkien'] = $this->getlinhkien();
        $data['template'] = 'admin/linhkien/chialinhkien';
        $this->load->view('admin/layout', $data);
    }

    public function editLinhkien() {
        $id = $_GET['id'] ? $_GET['id'] : '';
        $data = array();
        $data['linhkien'] = $this->getEditlinhkien($id);
        $data['template'] = 'admin/linhkien/edit';
        $this->load->view('admin/layout', $data);
    }

    public function deleteLinhkien() {
        $data = array();
        $data['linhkien'] = $this->getlinhkien();
        $data['template'] = 'admin/linhkien/delete';
        $this->load->view('admin/layout', $data);
    }

    public function kiemdemLinhkien() {
        $data = array();
        $data['linhkien'] = $this->getlinhkien();
        $data['template'] = 'admin/linhkien/kiemdem';
        $this->load->view('admin/layout', $data);
    }

    public function them() {
        $data = array(
            'malinhkien' => $this->input->post('_macuonlinhkien'),
            'maa' => $this->input->post('_maa'),
            'soluong' => $this->input->post('_soluong'),
        );
        $result = array();
        if ($data && is_array($data)) {
            if ($this->Linhkien_model->create($data)) {
                $result['success'] = 'success';
                $result['messeage'] = 'them thanh cong';
                echo json_encode($result);
                die();
            }
        }
    }

    public function sua() {
        $data = array(
            'soluong' => $this->input->post('_soluong'),
        );
        $id = $this->input->post('_id');
        $result = array();
        if ($data && is_array($data)) {
            $maaCheck = array('maa' => $this->input->post('_maa'));
            $id = $this->Linhkien_model->get_info_rule($maaCheck);
            $maa = $this->Linhkien_model->check_exists($maaCheck);
            $malinhkienCheck = array('malinhkien' => $this->input->post('_macuonlinhkien'));
            $malinhkien = $this->Linhkien_model->check_exists($malinhkienCheck);
            if ($maa === TRUE && $malinhkien === TRUE) {
                if ($this->Linhkien_model->update($id->id, $data)) {
                    $result['success'] = 'success';
                    $result['messeage'] = 'them thanh cong';
                    echo json_encode($result);
                    die();
                }
            } else {
                $result['success'] = 'fail';
                $result['messeage'] = 'Mã a hoặc mã linh kiện của bạn chưa tồn tại';
                echo json_encode($result);
                die();
            }
        }
    }

    public function chia() {
        $malinhkienduocchia = $this->input->post('_macuonlinhkienduocchia');
        $maaduocchia = $this->input->post('_maaduocchia');
        $maabichia = $this->input->post('_maabichia');
        $malinhkienbichia = $this->input->post('_macuonlinhkienbichia');
        $soluongbichia = $this->input->post('_soluongbichia');
        $soluongduocchia = $this->input->post('_soluongduocchia');
       // print_r($soluongduocchia); die();
        $dataWhere = array(
            'malinhkien' => $this->input->post('_macuonlinhkienduocchia'),
        );
        $dataWhere1 = array(
            'maa' => $this->input->post('_maaduocchia'),
        );
          $checkDb = $this->Linhkien_model->get_info_rule2($dataWhere,$dataWhere1);
       // print_r($checkDb); die();
        if ($checkDb[0]->malinhkien === $malinhkienduocchia && $maaduocchia === $checkDb[0]->maa) {
           // die('124');
            if ($malinhkienduocchia === $malinhkienbichia && $maaduocchia !== $maabichia) {
             // die('123');
                if ($soluongbichia <= $soluongduocchia) {
               //        die('123');
                    $soluongduocchiaCapnhat = (int) $soluongduocchia - (int) $soluongbichia;
                   // print_r($soluongduocchiaCapnhat); die();
                    
                    $data = array(
                        'malinhkien' => $malinhkienduocchia,
                        'maa' => $maaduocchia,
                        'soluong' => $soluongduocchiaCapnhat
                    );
                $query = "update tbl_linhkien set soluong='$soluongduocchiaCapnhat' where malinhkien='$malinhkienduocchia' and maa='$maaduocchia'";
               // print_r($query); die();
                   $result =   $this->Linhkien_model->query($query);
                 //  print_r($result); die();
                    $data1 = array(
                        'malinhkien' => $malinhkienbichia,
                        'maa' => $maabichia,
                        'soluong' => $soluongbichia
                    );
//                 /   print_r($data); die();
                    $rownNew = $this->Linhkien_model->create($data1);
                    // print_r($rownNew); die();
                    $maaCheck = array('maa' => $this->input->post('_macuonlinhkienduocchia'));
                    // $malinhkienduocchia = $this->input->post('_macuonlinhkienduocchia');
                  //  $id = $this->Linhkien_model->get_info_rule1($maaCheck);
                   // print_r($id);
                   // die();
                   // $rownUpdate = $this->Linhkien_model->update($id->id, $data);
                    $resultData = array();
                    if ($rownNew) {
                        $resultData['success'] = 'success';
                        $resultData['messeage'] = 'Chia Thành Công';
                        echo json_encode($resultData);
                        die();
                    } else {
                        $resultData['success'] = 'success';
                        $resultData['messeage'] = 'Chia Thất bại';
                        echo json_encode($resultData);
                        die();
                    }
                }
            }
        }
    }

   

    public function xoa() {
        $data = array(
            'maa' => $this->input->post('_maa'),
        );

        $id = $this->input->post('_id');
        $maa = $this->input->post('_maa');
        $malinhkien = $this->input->post('_macuonlinhkien');
        $result = array();
        if ($data && isset($data)) {
            $checkDb = $this->Linhkien_model->get_info_rule1($data);
            if ($checkDb->maa == $maa && $checkDb->malinhkien == $malinhkien) {
                if ($this->Linhkien_model->del_rule($data)) {
                    $result['success'] = 'success';
                    $result['messeage'] = 'Xóa Thành Công';
                    echo json_encode($result);
                    die();
                } else {
                    $result['success'] = 'fail';
                    $result['messeage'] = 'Xóa không Thành Công';
                    echo json_encode($result);
                    die();
                }
            } else {

                $result['success'] = 'fail';
                $result['messeage'] = 'Vui lòng kiểm tra lại thông tin nhập vào';
                echo json_encode($result);
                die();
            }
        }
    }

}
