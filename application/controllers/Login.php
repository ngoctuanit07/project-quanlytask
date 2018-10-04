<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User');
    }

    public function index() {
        $data = array();
        $this->load->helper('cookie');
        if ($this->input->post()) {
            //goi den ham kiem tra dang nhap check_login
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run()) {
                $taikhoan = $this->input->post('username');
                $this->input->cookie('logoutstatus', TRUE);
                //neu form da chay dung thi se tao 1 session cho admin
                $this->session->set_userdata('login', $taikhoan);
                redirect(admin_url('home'));
            }
        }
        $this->load->view('admin/login', $data);
        //$this->load->view('admin/login');
    }

    function check_login() {
        $taikhoan = $this->input->post('username');
        $matkhau = md5(sha1($this->input->post('password')));
        $where = array('username' => $taikhoan, 'password' => $matkhau);
        if ($this->User->check_exists($where)) {
            return true;
        } else {
            // tao 1 message thong bao dang nhap ko thanh cong
            $this->form_validation->set_message(__FUNCTION__, 'Không ??ng nh?p thành công');
            return false;
        }
    }

}
