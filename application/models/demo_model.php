<?php defined('BASEPATH') or exit('No direct scrript access Allowed');
class demo_model extends CI_Model
{

    public function save_data()
    {

        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'name'];
        }
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'email'];
        }
        if (!isset($_POST['phone']) || empty($_POST['phone'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'phone'];
        }
        if (!isset($_POST['class']) || empty($_POST['class'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'class'];
        }
        if (!isset($_POST['section']) || empty($_POST['section'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'section'];
        }
        if (!isset($_POST['collega']) || empty($_POST['collega'])) {
            return ['status' => 'badrequest', 'statusCode' => 400, 'return' => 'collega'];
        }

        if (!isset($_POST['id']) || empty($_POST['id'])) {

            $this->db->select('demo_table.*');
            $this->db->from('demo_table');
            $this->db->where('demo_table.phone', $_POST['phone']);
            $this->db->where('demo_table.del', '0');
            $result = $this->db->get()->row_array();
            if (empty($result)) {
                $data = [
                    'name' => isset($_POST['name']) ? $_POST['name'] : '',
                    'email' => $_POST['email'] ? $_POST['email'] : '',
                    'phone' => $_POST['phone'] ? $_POST['phone'] : '',
                    'class' => $_POST['class'] ? $_POST['class'] : '',
                    'section' => $_POST['section'] ? $_POST['section'] : '',
                    'collega' => $_POST['collega'] ? $_POST['collega'] : '',
                    'del' => '0'
                ];

                $result = $this->db->insert('demo_table', $data);

                $insert_id = $this->db->insert_id();

                if ($result) {
                    return ['status' => 'success', 'statusCode' => 200, 'return' => $insert_id];
                } else {
                    return ['status' => 'error', 'statusCode' => 400, 'return' => 'failed to insert'];
                }
            } else {
                $Msg = 'Mobile Number Already Exists with a Student';
                return ['status' => 'error', 'statusCode' => 400, 'return' => $Msg];
            }
        } else {
            $update = [
                'name' => isset($_POST['name']) ? $_POST['name'] : '',
                'email' => isset($_POST['email']) ? $_POST['email'] : '',
                'phone' => isset($_POST['phone']) ? $_POST['phone'] : '',
                'class' => isset($_POST['class']) ? $_POST['class'] : '',
                'section' => isset($_POST['section']) ? $_POST['section'] : '',
                'collega' => isset($_POST['collega']) ? $_POST['collega'] : '',
            ];
            $this->db->where('demo_table.id', $_POST['id']);
            $result = $this->db->update('demo_table', $update);

            if ($result) {
                return ['status' => 'success', 'statusCode' => 200, 'return' => 'record updated'];
            } else {
                return ['status' => 'error', 'statusCode' => 400, 'return' => 'failed to update'];
            }
        }
    }

    public function view_data()
    {
        $this->db->select('demo_table.*');
        $this->db->from('demo_table');
        $this->db->where('demo_table.del', '0');
        $result = $this->db->get()->result_array();
        if ($result > 0) {
            return ['status' => 'Success', 'statusCode' => 200, 'result' =>$result ];
        } else {
            $Msg ='Data Not found';
            return ['status' => 'Badrequest', 'statusCode' => 400, 'return' => $Msg];
        }
    }
    public function get_data()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->db->select('demo_table.*');
            $this->db->from('demo_table');
            $this->db->where('demo_table.id', $_GET['id']);
            $result = $this->db->get()->row_array();
            if ($result) {

                return   $result;
            } else {
                return ['id' => $_GET['id']];
            }
        }
    }

    public function delete_data()   
    {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            return ['status' => 'Badrequest', 'statusCode' => 400, 'result' => 'id'];
        }

        $this->db->where('demo_table.id', $_GET['id']);
        $result = $this->db->delete('demo_table');
        if ($result) {
            return ['status' => 'Success', 'statusCode' => 200, 'return' => $result];
        } else {
            return ['status' => 'Badrequest', 'statusCode' => 400, 'return' => " "];
        }
    }



   
}
