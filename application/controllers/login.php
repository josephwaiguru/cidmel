<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
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
            $this->load->view('template/welcome', array(
                'menu' => 'user/user_menu',
                'content' => 'login',
                'leftColumn' => 'fallo en la validación',
            ));
        } else {
            $userModel = new Users();
            $user = $userModel->get_by_login($_POST['login']);
            if ($user->isPasswordCorrect($_POST['password'])) {
                // Create Session
                $this->session->set_userdata(array(
                    'login' => $user->login,
                    'type' => $user->type,
                ));
                switch ($user->type) {
                    case 'admin':
                        redirect('admin/user');
                        break;
                    case 'teacher':
                    case 'student':
                        $this->load->view('welcome_message');
                        break;
                    default:
                }
            } else {
                // Password incorrect
                $this->load->view('template/welcome', array(
                    'menu' => 'user/user_menu',
                    'content' => 'login',
                    'leftColumn' => 'contraseña incorrecta',
                    'content' => $user->password . " => (" . sha1(md5($_POST['password'])) . ")<br/>",
                ));
            }
        }
    }

}