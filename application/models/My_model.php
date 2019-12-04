<?php

class My_model extends CI_Model {
    
    public function __construct(){
        $this->load->database();
    }

    public function get_trending_post(){
        $this->db->select('*, COUNT(likes.post_id) as likes');
        $this->db->from('post');
        $this->db->join('likes','post.id = likes.post_id', 'LEFT');
        $this->db->group_by('post.id');
        $this->db->order_by('likes', 'desc');
        $this->db->limit(5);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_users()
    {   
        $this->db->select('*');
        $this->db->where('profile.username = accounts.username');
        $result = $this->db->get('profile, accounts');
        return $result->result_array();   
    }
    public function new_user(){
        $this->db->order_by('username','DESC');
        $this->db->limit(5);
        $result = $this->db->get('profile');
        return $result->result_array();
    }

    public function add_guest($data){
        $userdata = array(
            'username' => $data['username'],
            'email' => $data['email'],
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

    public function each_post($id){

        $this->db->select('*, COUNT(likes.post_id) as claps, COUNT(comments.comment_id) as comments,profile.username as user');
        $this->db->from('profile');
        $this->db->join('post','profile.username = post.username');
        $this->db->join('likes', 'likes.post_id = post.id','LEFT');
        $this->db->join('comments', 'comments.post_id=post.id','LEFT');
        $this->db->where('post.id',$id);
        $this->db->group_by('post.id');
        $result = $this->db->get();
        return $result->result_array();

    }
    public function comments($id){

        $this->db->select('*');
        $this->db->from('comments');
        $this->db->join('profile','profile.username = comments.username');
        $this->db->where('comments.post_id',$id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function get_profile($profile){

        $this->db->where('username', $profile);
        $query = $this->db->get('profile');
        $result = $query->result_array();

        if(count($result) > 0){
            return $result[0];
        }else{
            return null;
        }
    }
    public function get_user_profile($profile){
        $this->db->where('username', $profile);
        $query = $this->db->get('profile');
        $result = $query->result_array();

        if(count($result) > 0){
            return $result[0];
        }else{
            return null;
        }
    }
    public function search_count($search){
        
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->join('post','profile.username = post.username');
        $this->db->join('likes', 'likes.post_id = post.id','LEFT');
        $this->db->like('profile.username',$search);
        $this->db->group_by('post.id');
        $this->db->order_by('date','desc');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function search_post($limit,$start,$search){

        $this->db->select('*, COUNT(likes.post_id) as claps, COUNT(comments.comment_id) as comments,profile.username as user');
        $this->db->from('profile');
        $this->db->join('post','profile.username = post.username');
        $this->db->join('likes', 'likes.post_id = post.id','LEFT');
        $this->db->join('comments', 'comments.post_id=post.id','LEFT');
        $this->db->like('profile.name',$search);
        $this->db->group_by('post.id');
        $this->db->order_by('date','desc');
        $this->db->limit($limit,$start);
        $result = $this->db->get();
        return $result->result_array();
    }
    public function search_people($search){

        $this->db->like('name', $search);
        $this->db->limit(4,0);
        $result = $this->db->get('profile');
        return $result->result_array();
    }

    public function user_post_count($user){
        
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->join('post','profile.username = post.username');
        $this->db->join('likes', 'likes.post_id = post.id','LEFT');
        $this->db->where('profile.username',$user);
        $this->db->group_by('post.id');
        $this->db->order_by('date','desc');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_user_post($limit,$start,$username){

        $this->db->select('*, COUNT(likes.post_id) as claps, COUNT(comments.comment_id) as comments,profile.username as user');
        $this->db->from('profile');
        $this->db->join('post','profile.username = post.username');
        $this->db->join('likes', 'likes.post_id = post.id','LEFT');
        $this->db->join('comments', 'comments.post_id=post.id','LEFT');
        $this->db->where('profile.username',$username);
        $this->db->group_by('post.id');
        $this->db->order_by('date','desc');
        $this->db->limit($limit,$start);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function my_post_count($user){
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->join('post','profile.username = post.username');
        $this->db->join('likes', 'likes.post_id = post.id','LEFT');
        $this->db->where('profile.username',$user);
        $this->db->group_by('post.id');
        $this->db->order_by('date','desc');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_my_post($limit,$start,$username){

        $this->db->select('*, COUNT(likes.post_id) as claps, COUNT(comments.comment_id) as comments,profile.username as user');
        $this->db->from('profile');
        $this->db->join('post','profile.username = post.username');
        $this->db->join('likes', 'likes.post_id = post.id','LEFT');
        $this->db->join('comments', 'comments.post_id=post.id','LEFT');
        $this->db->where('profile.username',$username);
        $this->db->group_by('post.id');
        $this->db->order_by('date','desc');
        $this->db->limit($limit,$start);
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

    public function post_count(){
        $this->db->select('*');
        $this->db->from('post');
        $this->db->join('profile', 'post.username = profile.username');
        $this->db->join('likes', 'likes.post_id=post.id','LEFT');
        $this->db->group_by('post.id');
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function get_post($limit, $start){

        $this->db->select('*, COUNT(likes.post_id) as claps, COUNT(comments.comment_id) as comments,profile.username as user');
        $this->db->from('post');
        $this->db->join('profile', 'post.username = profile.username');
        $this->db->join('likes', 'likes.post_id=post.id','LEFT');
        $this->db->join('comments', 'comments.post_id=post.id','LEFT');
        $this->db->group_by('post.id');
        $this->db->order_by('date','desc');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        
        return $query->result_array();

    }

    public function get_people(){
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->limit(4);
        $this->db->order_by('rand()');
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
                'post_image' => $post['image']
            );

            $this->db->insert('post', $data);
            return $this->db->affected_rows();
        }

    }

    public function edit_profile($data){

        $username = $data['username'];

        if($data['image']){

            $this->db->set('image',$data['image']);
            $this->db->where('username', $username);
            $this->db->update('profile');
            return $this->db->affected_rows();

        }elseif($data['cover']){
    
                $this->db->set('cover',$data['cover']);
                $this->db->where('username', $username);
                $this->db->update('profile');
                return $this->db->affected_rows();
        
        }else{
            $userdata = array(
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

    public function insert_claps($user){
        $claps = array(
            'post_id' => $user['claps'],
            'username' => $user['username']
        );

        $this->db->insert('likes', $claps);

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

    public function change_pass($data){

        $this->db->set('password', $data);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('accounts');
        return $this->db->affected_rows();
    }

    public function edit_post($data){

        $userdata = array(
            'post' => $data['post'],
            'post_image' => $data['image']
        );

        if(empty($data['image'])){
            $this->db->set('post', $data['post']);
            $this->db->where('id', $data['id']);
            $this->db->update('post');
        }elseif (empty($data['post'])) {
            $this->db->set('post_image', $data['image']);
            $this->db->where('id', $data['id']);
            $this->db->update('post');
        }else{
            $this->db->set($userdata);
            $this->db->where('id', $data['id']);
            $this->db->update('post');
        }
        
        return $this->db->affected_rows();
    }

}
?>