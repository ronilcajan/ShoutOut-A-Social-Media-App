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

    public function add_profile($user){
        
        $data = array(
                'username' => $user['username']
        );

        $this->db->insert('profile',$data);
        return $this->db->affected_rows();
    }

    public function get_profile($profile){
        $userdata = array(
            'username' => $profile['username']
        );

        $query = $this->db->get_where('profile', $userdata);
        $result = $query->result_array();

        if(count($result) > 0){
            return $result[0];
        }else{
            return null;
        }
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

    public function get_post(){

        $this->db->select('*');
        $this->db->from('post');
        $this->db->join('profile', 'post.username = profile.username');
        $this->db->order_by('date','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_post($post){
        $data = array(
            'username' => $post['username'],
            'post' => $post['post']
        );

        $this->db->insert('post', $data);
        return $this->db->affected_rows();

    }

}
?>