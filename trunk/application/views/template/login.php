<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
    }

    function index() {
        $form_rules = array(
            array(
                'field' => 'login',
                'label' => $this->lang->line('login'),
                'rules' => 'required|max_length[16]',
            ),
            array(
                'field' => 'password',
                'label' => $this->lang->line('password'),
                'rules' => 'required|max_length[16]',
            ),
        );
        $this->form_validation->set_rules($form_rules);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template', array(
                'menu' => 'user/user_menu',
                'content' => 'login',
            ));
        } else {
            $user = $this->Users_model->get_user_by_login($_POST['login']);
            if ($user->is_password_correct($_POST['password'])) {
                // Create Session
                print_r("Password correcto");
                $this->session->set_userdata(array('user' => serialize($user)));
                switch ($user->type) {
                    case 'admin':
                        redirect('/admin/users');
                        break;
                    case 'teacher':
                    case 'student':
                    default:
                        print_r("Not yet implemented");
                }
            } else {
                // Password incorrect
                $this->load->view('template', array(
                    'menu' => 'user/user_menu',
                    'content' => 'login',
                ));
            }
        }
    }
}