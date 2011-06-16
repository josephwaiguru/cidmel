<?php

class User extends CI_Controller {

    var $login;
    var $type;

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            $this->login = NULL;
        } else {
            $this->login = $this->session->userdata('login');
            $this->type = $this->session->userdata('type');
        }
    }

    function index() {
        if (!$this->login) {
            // There isn't session data, load login view
            $this->load->view('template/welcome');
            return;
        }

        if ($this->type != 'admin') {
            // User is not admin, load access denied view
            $this->load->view('template/error', array(
            ));
            return;
        }

        $usersModel = new Users();
        $usersList = $usersModel->getAllUsers();

        // Get all users and send the list to user's list view
        $data = array(
            'usersList' => $usersList,
            'login' => $this->login,
            'user_list' => $usersList,
        );
        $this->load->view('template/admin', $data);
    }

    function add() {
        $form_rules = array(
            array(
                'field' => 'login',
                'label' => $this->lang->line('login'),
                'rules' => 'required|max_length[16]',
            ),
            array(
                'field' => 'password',
                'label' => $this->lang->line('password'),
                'rules' => 'required|max_length[16]|matches[confirm]',
            ),
            array(
                'field' => 'name',
                'label' => $this->lang->line('name'),
                'rules' => 'required|max_length[32]',
            ),
            array(
                'field' => 'type',
                'label' => $this->lang->line('user_type'),
                'rules' => 'required',
            )
        );
        $this->form_validation->set_rules($form_rules);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/editUser', array(
                'user' => null,
                'action' => 'add',
            ));
        } else {
            //$user = $this->Users_model->create_user($_POST['idusers'], $_POST['login'], $_POST['password'], $_POST['name'], $_POST['type'], $_POST['preferred_language']);
            $user = new Users();
            $user->login = $_POST['login'];
            $user->password = $_POST['password'];
            $user->name = $_POST['name'];
            $user->language = $_POST['language'];
            $user->type = $_POST['type'];
            $user->save();
            redirect('admin/user');
        }
    }

    function delete($id) {
        $usersModel = new Users();
        $usersModel->delete($id);
        redirect('admin/user');
    }

    function edit($id) {
        //$user = $this->Users_model->get_user_by_id($id);
        $userModel = new Users();
        $user = $userModel->where('idusers', $id)->get();
        $form_rules = array(
            array(
                'field' => 'login',
                'label' => $this->lang->line('login'),
                'rules' => 'required|max_length[16]',
            ),
            array(
                'field' => 'password',
                'label' => $this->lang->line('password'),
                'rules' => 'required|max_length[16]|matches[confirm]',
            ),
            array(
                'field' => 'name',
                'label' => $this->lang->line('name'),
                'rules' => 'required|max_length[32]',
            ),
            array(
                'field' => 'type',
                'label' => $this->lang->line('user_type'),
                'rules' => 'required',
            )
        );
        $this->form_validation->set_rules($form_rules);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/editUser', array(
                'user' => $user,
                'action' => 'edit/'.$id,
            ));
        } else {
            $user = new Users();
            $user->idusers = $_POST['idusers'];
            $user->login = $_POST['login'];
            $user->password = $_POST['password'];
            $user->name = $_POST['name'];
            $user->type = $_POST['type'];
            $user->language = $_POST['language'];
            $user->edit();
            redirect('/admin/user');
        }
    }

}
