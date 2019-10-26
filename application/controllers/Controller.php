<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

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

    public function signup_submit(){

        //check validation
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');

        if($this->input->post('password') == $this->input->post('password1')){

            if($this->form_validation->run()==FALSE){

                $data['message_display'] = "Something went wrong.";
                $this->load->view('templates/header-login-signup');
                $this->load->view('signup', $data);
                $this->load->view('templates/footer');

            }else{

                $this->load->model('my_model');
                
                $username = array('username' => $this->input->post('username'));
                
                $query = $this->my_model->check_username($username);

                if(!is_null($query)){
                    $data['message_display'] = "Username already exist. Please try again.";
                    $this->load->view('templates/header-login-signup');
                    $this->load->view('signup',$data);
                    $this->load->view('templates/footer');

                }else{

                    $data = array(
                        'username' => $this->input->post('username'),
                        'password' => md5($this->input->post('password'))
                    );

                    $result = $this->my_model->add_guest($data);
                    $result2 = $this->my_model->add_profile($data);

                    if($result == TRUE && $result2 == TRUE){

                        redirect(base_url('login'));

                    }
                }
            }
        }else{
            $data['message_display'] = 'Password did not match.Please try again!';
            $this->load->view('templates/header-login-signup');
            $this->load->view('signup',$data);
            $this->load->view('templates/footer');
        }
    }

    public function login_submit(){

        $logindata = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );

        $this->load->model('my_model');

        $response = $this->my_model->user_auth($logindata);

        if(!is_null($response)){
            $sess_data = array(
                'username' => $response['username'],
                'password' => $response['password'],
                'logged_in' => TRUE
            );
            
            $this->session->set_userdata($sess_data);
            // $this->session->set_userdata('logged in', TRUE);
            redirect(base_url('home'));

        }else{
            $data['error_message'] = "Username and password did not match.Please try again!";

			$this->load->view('templates/header-login-signup');
			$this->load->view('login',$data);
			$this->load->view('templates/footer');
        }
        
    }

    //function to check if user is in session
    public function check_auth(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
    }
    
    public function home(){

        $this->check_auth('home');
        
        $this->load->model('my_model');
        $data['post'] = $this->my_model->get_post();

        $username = array('username' => $this->session->userdata('username'));

        $result = $this->my_model->get_profile($username);


        if(!is_null($result)){
            $data['profile'] = array(
                'image' => $result['image']
            );

            $this->load->view('templates/main');
            $this->load->view('main',$data);
            $this->load->view('templates/footer');

        }
        
    }

    public function profile(){
        $this->check_auth('profile');
        $this->load->model('my_model');

        $username = array('username' => $this->session->userdata('username'));

        $result = $this->my_model->get_profile($username);

        $data['post'] = $this->my_model->get_my_post($username);

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
        $this->load->model('my_model');

        $this->form_validation->set_rules('post','post','required');

        if($this->input->post('identifier') == "/home"){

            if($this->form_validation->run() == FALSE){
                
                $data['message_display'] = "Something went wrong.";
                redirect(base_url('home'));
            
            }else{
                $data = array(
                    'username' => $this->session->userdata('username'),
                    'post' => $this->input->post('post')
                );

                $result = $this->my_model->insert_post($data);

                if($result == TRUE){
                    redirect(base_url('home'));
                }
            }

        }else{
            if($this->form_validation->run() == FALSE){
                
                $data['message_display'] = "Something went wrong.";
                redirect(base_url('profile'));
            
            }else{
                $data = array(
                    'username' => $this->session->userdata('username'),
                    'post' => $this->input->post('post')
                );

                $result = $this->my_model->insert_post($data);

                if($result == TRUE){
                    redirect(base_url('profile'));
                }
            }
        }
    }

    public function edit_profile(){


            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            // $config['max_size'] = '100';
            // $config['max_width'] = '1024';
            // $config['max_height'] = '768';
            

            $this->load->library('upload',$config);

            if($this->upload->do_upload('image')){

                $filedata = $this->upload->data();
                $filename = $filedata['raw_name'].$filedata['file_ext'];

                if($this->upload->do_upload('cover')){
                    $filedata1 = $this->upload->data();
                    $filename1 = $filedata1['raw_name'].$filedata1['file_ext'];

                    $data = array(
                        'username' => $this->session->userdata('username'),
                        'image' => $filename,
                        'cover' => $filename1,
                        'name' => $this->input->post('name'),
                        'bio' => $this->input->post('bio'),
                        'address' => $this->input->post('address'),
                        'birthdate' => $this->input->post('born-date')
                    );

                    $this->load->model('my_model');
                    $upload = $this->my_model->edit_profile($data);

                    if($upload == TRUE){
                        redirect('profile');
                    }
                }
            }else{
                $error = array('error' => $this->upload->display_errors());
                $error['ero'] = $this->upload->do_upload('cover');
                $this->load->view('error',$error);
            }
    }

    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('logged_in');
        redirect(base_url(),'refresh');
        
    }

    
}
