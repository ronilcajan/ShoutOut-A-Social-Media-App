<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shout extends CI_Controller {

	public function index()
	{
        $this->load->view('templates/header-home');
        $this->load->view('home');
        $this->load->view('templates/footer');
    }
    
	public function about(){
		$this->load->view('templates/header-about');
        $this->load->view('about');
        $this->load->view('templates/footer');
    }
    
    public function login(){
        $this->load->view('templates/header-login-signup');
        $this->load->view('login');
        $this->load->view('templates/footer');
    }

    public function signup(){
        $this->load->view('templates/header-login-signup');
        $this->load->view('signup');
        $this->load->view('templates/footer');
    }

    public function error404(){
        $this->load->view('templates/header-login-signup');
        $this->load->view('error');
        $this->load->view('templates/footer');
    }

    public function signup_submit(){
        
        $validation = array('success' => false, 'message' => array());

        if($this->input->post('password') == $this->input->post('password1')){

                $username = array('username' => $this->input->post('username'));
                
                $query = $this->my_model->check_username($username);

                if(!is_null($query)){

                    $validation['success'] = false;
                    $validation['message'] = "Username already exist. Please try another username.";

                }else{

                    $data = array(
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'password' => sha1($this->input->post('password'))
                    );

                    $result = $this->my_model->add_guest($data);
                    $result2 = $this->my_model->add_profile($data);

                    if($result == TRUE && $result2 == TRUE){

                        $validation['success'] = true;
                        $validation['message'] = "login";

                    }
                }


        }else{
            $validation['success'] = false;
            $validation['message'] = "Password did not match!";
        }

        echo json_encode($validation);
    }


    public function login_submit(){
        $validation = array('success' => false, 'message' => array());

        $logindata = array(
            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password'))
        );
    
        $response = $this->my_model->user_auth($logindata);

        if(!is_null($response)){
            $sess_data = array(
                'username' => $response['username'],
                'password' => $response['password'],
                'logged_in' => TRUE,
                'remember_me' => TRUE
            );
            
            $this->session->set_userdata($sess_data);
            
            $validation['success'] = true;
            $validation['message'] = "profile";

        }else{
            $validation['success'] = false;
            $validation['message'] = "Username and Password is incorrect!";
        }

        echo json_encode($validation);
        
    }

    //function to check if user is in session
    public function check_auth(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
    }

    public function each_post($id){

        $this->check_auth('home');
        
        $data['post'] = $this->my_model->each_post($id);
        $data['comments'] = $this->my_model->comments($id);

        $result = $this->my_model->get_profile($this->session->userdata('username'));

        if(!is_null($result)){
            $data['profile'] = array(
                'image' => $result['image']
            );

            $this->load->view('templates/main');
            $this->load->view('post',$data);
            $this->load->view('templates/footer');

        }

    }
    
    public function home(){

        $this->check_auth('home');
        
        $config['base_url'] = base_url().'shout/home';
        $config['total_rows'] = $this->my_model->post_count();
        $config['per_page'] = 10;
        $config['uri_segment'] = "3";
        $config['full_tag_open'] = '<ul class="pagination pagination-sm justify-content-center">';
        $config['full_tag_close'] = ' </ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) :0;
        
        $data['post'] = $this->my_model->get_post($config['per_page'], $page);

        $data['links'] = $this->pagination->create_links();

        $result = $this->my_model->get_profile($this->session->userdata('username'));

        $data['people'] = $this->my_model->get_people();

        if(!is_null($result)){
            $data['profile'] = array(
                'image' => $result['image']
            );

            $this->load->view('templates/main');
            $this->load->view('allpost',$data);
            $this->load->view('templates/footer');

        }
        
    }

    public function user_profile($username){
        $this->check_auth('user_profile');

        if($username != $this->session->userdata('username')){    
            $config['base_url'] = base_url().'shout/profile';
            $config['total_rows'] = $this->my_model->user_post_count($username);
            $config['per_page'] = 10;
            $config['uri_segment'] = "3";
            $config['full_tag_open'] = '<ul class="pagination pagination-sm justify-content-center">';
            $config['full_tag_close'] = ' </ul>';
            $config['attributes'] = ['class' => 'page-link'];
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) :0;
            
            $data['post'] = $this->my_model->get_user_post($config['per_page'], $page,$username);

            $data['links'] = $this->pagination->create_links();

            $result = $this->my_model->get_user_profile($username);

            $user = $this->my_model->get_profile($this->session->userdata('username'));

            if(!is_null($result)){
                $data['user_profile'] = array(
                    'username' => $result['username'],
                    'image' => $result['image'],
                    'cover' => $result['cover'],
                    'name' => $result['name'],
                    'bio' => $result['bio'],
                    'address' => $result['Address'],
                    'birthdate' => $result['birthdate']
                );

                $data['profile'] = array(
                    'image' => $user['image']
                );

                $this->load->view('templates/main');
                $this->load->view('user_profile',$data);
                $this->load->view('templates/footer');

            }
        }else{
            redirect(base_url('profile'));
        }
    }

    public function profile(){
        $this->check_auth('profile');
        
        $config['base_url'] = base_url().'shout/profile';
        $config['total_rows'] = $this->my_model->my_post_count($this->session->userdata('username'));
        $config['per_page'] = 10;
        $config['uri_segment'] = "3";
        $config['full_tag_open'] = '<ul class="pagination pagination-sm justify-content-center">';
        $config['full_tag_close'] = ' </ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) :0;
        
        $data['post'] = $this->my_model->get_my_post($config['per_page'], $page, $this->session->userdata('username'));

        $data['links'] = $this->pagination->create_links();

        $result = $this->my_model->get_profile($this->session->userdata('username'));

        if(!is_null($result)){
            $data['profile'] = array(
                'username' => $result['username'],
                'image' => $result['image'],
                'cover' => $result['cover'],
                'name' => $result['name'],
                'bio' => $result['bio'],
                'address' => $result['Address'],
                'birthdate' => $result['birthdate']
            );

            $this->load->view('templates/main');
            $this->load->view('profile',$data);
            $this->load->view('templates/footer');

        }

    }


    public function post_submit(){

        $validator = array('success' => false, 'messages' => array());

        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);

        if(!$this->upload->do_upload('shout-img')){
            $data = array(
                'username' => $this->session->userdata('username'),
                'post' => $this->input->post('post'),
                'image' => ""
            );

            $result = $this->my_model->insert_post($data);

            if($result == TRUE){
                $validator['success'] = true;
                $validator['messages'] = "You created some post.";
            }

        }else{
            $data = $this->upload->data();
			//Resize and Compress Image
			$config['image_library'] = 'gd2';
			$config['source_image'] = './uploads/'.$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['quality'] = '60%';
			$config['width'] = 600;
			$config['height'] = 400;
			$config['new_image'] = './uploads/'.$data['file_name'];

			$this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $data = array(
                'username' => $this->session->userdata('username'),
                'post' => $this->input->post('post'),
                'image' => $data['file_name']
            );
            $result = $this->my_model->insert_post($data);

            if($result == true){
                $validator['success'] = true;
                $validator['messages'] = "You created some post.";
            }
        }

        echo json_encode($validator);

    }

    public function edit_profile(){
        
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);

        if(!$this->upload->do_upload('cover') && !$this->upload->do_upload('image')){
            $userdata = array(
                'username' => $this->session->userdata('username'),
                'name' => $this->input->post('name'),
                'bio' => $this->input->post('bio'),
                'address' => $this->input->post('address'),
                'birthdate' => $this->input->post('born-date')
            );

            $upload = $this->my_model->edit_profile($userdata);

            if($upload == TRUE){
                redirect('profile');
            }
        }elseif(!empty($_FILES['cover']['name'])){

            $data = $this->upload->data();
			//Resize and Compress Image
			$config['image_library'] = 'gd2';
			$config['source_image'] = './uploads/'.$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['quality'] = '60%';
			$config['width'] = 600;
			$config['height'] = 400;
			$config['new_image'] = './uploads/'.$data['file_name'];

			$this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $userdata = array(
                'username' => $this->session->userdata('username'),
                'cover' => $data['file_name']
            );

            $upload = $this->my_model->edit_profile($userdata);
            if($upload == TRUE){
                redirect('profile');
            }

        }else{

            $data = $this->upload->data();
			//Resize and Compress Image
			$config['image_library'] = 'gd2';
			$config['source_image'] = './uploads/'.$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['quality'] = '60%';
			$config['width'] = 600;
			$config['height'] = 400;
			$config['new_image'] = './uploads/'.$data['file_name'];

			$this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $userdata = array(
                'username' => $this->session->userdata('username'),
                'image' => $data['file_name']
            );

            $upload = $this->my_model->edit_profile($userdata);
            if($upload == TRUE){
                redirect('profile');
            }
        }
    }

    public function search(){

        $this->check_auth('search');
        $search = $this->input->post('search');

        $config['base_url'] = base_url().'shout/search';
        $config['total_rows'] = $this->my_model->search_count($search);
        $config['per_page'] = 10;
        $config['uri_segment'] = "3";
        $config['full_tag_open'] = '<ul class="pagination pagination-sm justify-content-center">';
        $config['full_tag_close'] = ' </ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) :0;
        
        $data['post'] = $this->my_model->search_post($config['per_page'], $page, $search);

        $data['links'] = $this->pagination->create_links();

        $data['people'] = $this->my_model->search_people($search);

        $result = $this->my_model->get_profile($this->session->userdata('username'));

        if(!is_null($result)){
            $data['profile'] = array(
                'image' => $result['image']
            );

            $this->load->view('templates/main');
            $this->load->view('search_result',$data);
            $this->load->view('templates/footer');

        }
    }

    public function delete_post($id){
        if(empty($id)){
            show_404();
        }
        $this->load->model('my_model');
        $query = $this->my_model->delete_post($id);

        if($query){
            $message['success'] = 'Deleted Successfully';
            redirect(base_url('profile'));
        }
    }

    public function claps($id){
        $validator = array('success' => false, 'messages' => array());

        $user = array(
            'claps' => $id,
            'username' => $this->session->userdata('username')
        ); 

        $data = $this->my_model->insert_claps($user);

        if($data == true){
            $url = $this->input->post('identifier');
            if($url == '/profile' || strpos($url,'/profile') ){
                redirect(base_url('profile'));
            }elseif(strpos($url,'username')){
                $user = str_replace('/username','',$url);

                redirect('username'.$user);
            }
            
            redirect(base_url('home'));
        }



    }

    public function comment($post_id){

        $comment = array(
            'post-id' => $post_id,
            'username' => $this->session->userdata('username'),
            'comment' => $this->input->post('comment')
        );

        $data = $this->my_model->insert_comment($comment);

        if($data == true){
            $url = $this->input->post('identifier');
            if($url == '/profile' || strpos($url,'/profile') ){
                redirect(base_url('profile'));

            }elseif(strpos($url,'username')){
                $user = str_replace('/username','',$url);
                redirect('username'.$user);

            }elseif(strpos($url, 'shout')){
                $post = str_replace('/shout','',$url);
                redirect('shout'.$post);

            }else{
                redirect(base_url('home'));
            }
        }
    }
    public function change_pass(){
        $validation = array('success' => false, 'message' => array());
    
        $response = $this->my_model->change_pass(sha1($this->input->post('password2')));

        if(!is_null($response)){
            
            $validation['success'] = true;
            $validation['message'] = "Password successfully changed. You will be logged out!";

        }else{

            $validation['success'] = false;
            $validation['message'] = "Password is incorrect!";
        }

        echo json_encode($validation);
        
    }

    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('logged_in');
        redirect(base_url(),'refresh');
    }

    
}
