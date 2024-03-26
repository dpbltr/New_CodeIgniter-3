<?php defined('BASEPATH') or exit('No dirct script Access Allowed');
class validation_model extends CI_Model
{


    public function registration()
    {

        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'name'];
        }
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'email'];
        }
        if (!isset($_POST['mobile_no']) || empty($_POST['mobile_no'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'mobile_no'];
        }
        if (!isset($_POST['address']) || empty($_POST['address'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'cddress'];
        }
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'password'];
        }
        if (!isset($_POST['confirmation_password']) || empty($_POST['confirmation_password'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'confirmation_password'];
        }
        if (!isset($_POST['id']) || empty($_POST['id'])) {

            $this->db->select('registration.*');
            $this->db->from('registration');
            $this->db->where('registration.mobile_no', $_POST['mobile_no']);
            $this->db->where('registration.email', $_POST['email']);
            $this->db->where('registration.del', '0');
            $result = $this->db->get()->row_array();
            if (empty($result)) {

                $data = array(
                    'name' => isset($_POST['name']) ? $_POST['name'] : '',
                    'email' => isset($_POST['email']) ? $_POST['email'] : '',
                    'mobile_no' => isset($_POST['mobile_no']) ? $_POST['mobile_no'] : '',
                    'address' => isset($_POST['address']) ? $_POST['address'] : '',
                    'password' => isset($_POST['password']) ? $_POST['password'] : '',
                    'confirmation_password' => isset($_POST['confirmation_password']) ? $_POST['confirmation_password'] : '',
                    'del' => '0'
                );
                $result = $this->db->insert('registration', $data);
                $insert_id = $this->db->insert_id();
                return ['insert_id' => $insert_id, 'return' => $result];
                if ($result) {
                    return ['status' => 'Success', 'statusCode' => 200, 'return' => $result];
                } else {
                    return ['status' => 'Badrequest', 'statusCode' => 400, 'return' => ''];
                }
            } else {
                $Msg = 'Customer Allready exists with mobile_No';
                return ['status' => 'Badrquest', 'statusCode' => 200, 'return' => $Msg];
            }
        } else {
            $update = array(
                'name' => isset($_POST['name']) ? $_POST['name'] : '',
                'email' => isset($_POST['email']) ? $_POST['email'] : '',
                'mobile_no' => isset($_POST['mobile_no']) ? $_POST['mobile_no'] : '',
                'address' => isset($_POST['address']) ? $_POST['address'] : '',
                'password' => isset($_POST['password']) ? $_POST['password'] : '',
                'confirmation_password' => isset($_POST['confirmation_password']) ? $_POST['confirmation_password'] : '',
                'del' => '0'
            );
            $this->db->where('registration.id', $_POST['id']);
            $result = $this->db->update('registration', $update);
            if ($result) {
                return ['status' => 'Success', 'statusCode' => 200, 'return' => $result];
            } else {
                return ['status' => 'Badrequest', 'statusCode' => 400, 'return' => ''];
            }
        }
    }



    public function login()
    {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            
            return ['status' => 'Badrquest', 'statusCode' => 400, 'return' => 'email'];
        }
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            
            return ['status' => 'Badrquest', 'statusCode' => 400, 'return' => 'password'];
        }
        
        $this->db->select('registration.*');
        $this->db->from('registration');
        $this->db->where('registration.email', $_POST['email']);
        $this->db->where('registration.password', $_POST['password']);
        $result = $this->db->get()->row_array();
        if ($result) {

            return ['status' => 'Success', 'statusCode' => 200, 'return' => $result];
        } else {
            return ['status' => 'Badrequest', 'statusCode' => 400, 'return' => ''];
        }
    }

    public function view_data()
    {
        $this->db->select('registration.*');
        $this->db->from('registration');
        $result = $this->db->get()->result_array();
        if ($result > 0) {
            return ['status' => 'Success', 'statusCode' => 200, 'return' => $result];
        } else {
            $Msg = 'Data Not found';
            return ['status' => 'Badrequest', 'statusCode' => 400, 'return' => $Msg];
        }
    }

    public function edit_data()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $this->db->select('registration.*');
            $this->db->from('registration');
            $this->db->where('registration.id', $_GET['id']);
            $result = $this->db->get()->row_array();
            if ($result) {
                return $result;
            } else {
                return ['id' => $_GET['id']];
            }
        }
    }

    public function delete()
    {
        $this->db->where('registration.id', $_GET['id']);
        $this->db->where('registration.del', '0');
        $abq  = $this->db->delete('registration');
        if ($abq) {
            $Msg = 'Data Successfully Deleted';
            return ['status' => 'Success', 'statusCode' => 200, 'result' => $Msg];
        } else {
            return ['status' => 'Badrequest', 'statusCode' => 400, 'return' => ''];
        }
    }
}
