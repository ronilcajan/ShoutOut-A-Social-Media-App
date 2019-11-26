<?php

class My_model extends CI_Model {
    
    public function __construct(){
        $this->load->database();
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
        var_dump($data);
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
}
?>