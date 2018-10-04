<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->lang->load('user');
       // print_r($this->session->get_userdata('login')); die();
        $sessionUser = $this->session->get_userdata('login');
        // kiem tra co session dang nhap hay khong
        if ($this->session->get_userdata('login')['login'] && isset($sessionUser)) {
            // do something when exist
            $data = array();
            $data['title'] = "Quan ly linh kien";
            $this->load->view('admin/layout', $data);
        } else {
            // do something when doesn't exist
             redirect(admin_url('login'));
        }
    }

}
