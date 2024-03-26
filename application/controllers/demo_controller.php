<?php defined('BASEPATH') or exit('No direct script access Allowed ');
class demo_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('demo_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        if (json_decode((file_get_contents('php://input')), true) != FALSE) {
            $_POST = json_decode((file_get_contents('php://input')), true);
        }
    }

    public function get_data()
    {
        $data =  [];
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $data['userData'] = $this->demo_model->get_data();
        }
        $this->load->view('name', $data);
    }

    public function view_data()
    {
        $result = $this->demo_model->view_data();   
        $data = $result;
        $this->load->view('show_logindata', $data);
    }

    public function save_data()
    {
        $result = $this->demo_model->save_data();
        $data = $result;
        $this->load->view('login', $data);
        return redirect('demo_controller/view_data');
    }

    public function delete_data()
    {
        $result = $this->demo_model->delete_data();
        return redirect('demo_controller/view_data');
    }
}
