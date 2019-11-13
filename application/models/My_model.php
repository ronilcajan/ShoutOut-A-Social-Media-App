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
    public function get_my_post($username){
        $user = $username['username'];

        $this->db->select('*, COUNT(post_id) as like_post');
        $this->db->from('profile');
        $this->db->join('post','profile.username = post.username');
        $this->db->where('profile.username',$user);
        $this->db->join('likes', 'likes.post_id = post.id','LEFT');
        $this->db->group_by('post.id');
        $this->db->order_by('date','desc');
        $result = $this->db->get();


        return $result->result_array();
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

        $this->db->select('*, COUNT(post_id) as like_post');
        $this->db->from('post');
        $this->db->join('profile', 'post.username = profile.username');
        $this->db->join('likes', 'likes.post_id=post.id','LEFT');
        $this->db->group_by('post.id');
        $this->db->order_by('date','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_post($post){

        if(empty($post['image'])){
            $data = array(
                'username' => $post['username'],
                'post' => $post['post']
            );

            $this->db->insert('post', $data);
            return $this->db->affected_rows();
        }else{

            $data = array(
                'username' => $post['username'],
                'post' => $post['post'],
                'post-image' => $post['image']
            );

            $this->db->insert('post', $data);
            return $this->db->affected_rows();
        }

    }

    public function edit_profile($data){

        $username = $data['username'];

        if($data['image'] == 1){
            $userdata = array(
                'cover' => $data['cover'],
                'name' => $data['name'],
                'bio' => $data['bio'],
                'Address' => $data['address'],
                'birthdate' => $data['birthdate']
            );

            $this->db->set($userdata);
            $this->db->where('username', $username);
            $this->db->update('profile');
            return $this->db->affected_rows();

        }elseif($data['cover'] == 2){

            $userdata = array(
                'image' => $data['image'],
                'name' => $data['name'],
                'bio' => $data['bio'],
                'Address' => $data['address'],
                'birthdate' => $data['birthdate']
            );

            $this->db->set($userdata);
            $this->db->where('username', $username);
            $this->db->update('profile');
            return $this->db->affected_rows();
            
        }elseif($data['image'] == 3 && $data['cover'] == 3){

            $userdata = array(
                'name' => $data['name'],
                'bio' =>  $data['bio'],
                'Address' => $data['address'],
                'birthdate' => $data['birthdate']
            );

            $this->db->set($userdata);
            $this->db->where('username', $username);
            $this->db->update('profile');
            return $this->db->affected_rows();

        }else{

            $userdata = array(
                'image' => $data['image'],
                'cover' => $data['cover'],
                'name' => $data['name'],
                'bio' => $data['bio'],
                'Address' => $data['address'],
                'birthdate' => $data['birthdate']
            );

            $this->db->set($userdata);
            $this->db->where('username', $username);
            $this->db->update('profile');
            return $this->db->affected_rows();
        }
    }

    public function delete_post($id){

        $this->db->where('id',$id);
        $query = $this->db->delete('post');
        return $this->db->affected_rows();
    }

    public function insert_like($user){
        $likes = array(
            'post_id' => $user['post-id'],
            'username' => $user['username']
        );

        $this->db->insert('likes', $likes);

        return $this->db->affected_rows();
    }

    public function insert_comment($data){
        $userdata = array(
            'post_id' => $data['post-id'],
            'username' => $data['username'],
            'comments' => $data['comment']
        );

        $this->db->insert('comments', $userdata);
        return $this->db->affected_rows();
    }
}
?>