<?php defined('BASEPATH') or exit('No direct script access Allowed');
class validation extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('validation_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        if (json_decode((file_get_contents('php://input')), true) != FALSE) {
            $_POST = json_decode((file_get_contents('php://input')), true);
        }
    }

    public function login()
    {

        $result = $this->validation_model->login();
        if ($result['statusCode'] == 200) {
            $this->load->view('contract_form');
        } else {
            $this->load->view('login_page');
        }
    }

    public function registration()
    {
        $result = $this->validation_model->registration();
        if ($result['return'] == 200) {
            return redirect('validation/view_data');

        } else {
            $this->load->view('registration');
        }
    }

    public function view_data()
    {
        $result = $this->validation_model->view_data();
        $data['result'] = $result;
        $this->load->view('registration_view', $data);
    }

    public function edit_data()
    {
        $data =  [];
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $data['userData'] = $this->validation_model->edit_data();
        }
        $this->load->view('registration_show', $data);
    }

    public function delete()
    {
        $result = $this->validation_model->delete();
        return redirect('validation/view_data');
    }
}
