<?php

class My_model extends CI_Model {
    
    public function __construct(){
        $this->load->database();
    }

    public function add_guest($data){
        $userdata = array(
            'username' => $data['username'],
            'password' => $data['password']
        );

        $this->db->insert('accounts',$userdata);
        return $this->db->affected_rows();
    }

    public function check_username($username)
    {
        $userdata = array(
            'username' => $username['username']
        );

        $query = $this->db->get_where('accounts',$userdata);
        $result = $query->result_array();

        if(count($result) > 0){
            return $result[0];
        }else{
            return null;
        }
    }

    public function user_auth($userdata){

        $querydata = array(
            'username' => $userdata['username'],
            'password' => $userdata['password']
        );

        $query = $this->db->get_where('accounts', $querydata);
        $result = $query->result_array();

        if(count($result) > 0){
            return $result[0];
        }else{
            return null;
        }
    }

}
?>