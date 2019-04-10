<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('page');

    }

    public function index(){
        $data['css'] = base_url('assets/css/bootstrap.min.css');
        $data['title'] = "Home page";
        $data['message'] = "Hello world from the controller";
        $data['content'] = 'pages/home';
        $this->load->view('layouts/master', $data);

    }

    public function about(){
        $data['title'] = "About page";
        $data['message'] = "Hello world from the controller About";
        $data['content'] = 'pages/about';
        $this->load->view('layouts/master', $data);

    }

    public function profile(){
        $data['title'] = "Profile page";
        $data['message'] = "Hello world from the controller Profile";
        $data['content'] = 'pages/profile';
        $this->load->view('layouts/master', $data);

    }

    public function forms(){
        $data['title'] = "CI Forms";
        $data['content'] = 'pages/forms';
        $this->load->view('layouts/master', $data);
    }

    public function form_submitted(){
        echo "form has submitted";
        /* $data['title'] = "CI Forms";
        $data['content'] = 'pages/forms';
        $this->load->view('layouts/master', $data); */
    }

    public function add_posts(){
        $data['title'] = "CI Add Posts";
        $data['content'] = 'pages/add_posts';
        $this->load->view('layouts/master', $data);
    }

    public function form_posted(){

        // Form validation code
        $this->form_validation->set_rules('title','Title','trim|required|callback_title_check');
        $this->form_validation->set_rules('body','Body','trim|required');

            if($this->form_validation->run()===FALSE){
                $data['title'] = "CI Add Posts";
                $data['content'] = 'pages/add_posts';
                $this->load->view('layouts/master', $data);
            }
            else{

                $title = $this->input->post('title');
                $body = $this->input->post('body');
                $data= array(
                    'title'=>$title,
                    'body' => $body
                );
                if($this->page->create($data)){
                    $data['title'] = "CI Form Posted";
                    $data['content'] = 'pages/form_posted';
                    $this->load->view('layouts/master', $data);
                }else{
                    echo 'You cannot make new post';
                }

                
            }
                
    }

    public function title_check($str){
        if($str=='test'){
            $this->form_validation->set_message('title_check','The title field shoudnot be test');
            return false;
        }
        else{
            return true;
        }

    }

    public function posts(){
        $data['title'] = "CI | All Posts";
        $data['content'] = 'pages/posts';
        $data['get_posts'] = $this->page->get_posts();
        $this->load->view('layouts/master', $data);
    }

    public function view_post(){
        $id = $this->uri->segment(3);
        if(empty($id)){
            show_404();
        }
        $data['title'] = "CI | View Post";
        $data['content'] = 'pages/view_post';
        $data['get_posts'] = $this->page->view_single_post($id);
        $this->load->view('layouts/master', $data);
    }

    public function edit_post(){
        $id = $this->uri->segment(3);
        if(empty($id)){
            show_404();
        }
        $data['title'] = "CI | Edit Post";
        $data['content'] = 'pages/edit_post';
        $data['get_post'] = $this->page->view_single_post($id);
        $this->load->view('layouts/master', $data);
    }

    public function update_post(){
        $id = $this->input->post('post_id');
        $title = $this->input->post('title');
        $body = $this->input->post('body');

        $data = array(
            'title' => $title,
            'body' => $body

        );
        if($this->page->update_post($data, $id)){
            redirect('pages/posts');
        }
    }


    public function delete_post(){
        $id = $this->uri->segment(3);
        // checking whether 'page' model with function delete_post($id) called...?
        if($this->page->delete_post($id)){
            redirect('pages/posts');
        }
    }
}