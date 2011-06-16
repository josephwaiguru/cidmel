<?php

class Course extends CI_Controller {
    
    var $sessionLogin;
    var $sessionType;

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            $this->sessionLogin = null;
        } else {
            $this->sessionLogin = $this->session->userdata('login');
            $this->sessionType = $this->session->userdata('type');
        }
    }

    function index() {
        $courseModel = new Courses();
        $courseList = $courseModel->getAllCourses();
        $this->load->view('template/courseList', array(
            'sessionLogin' => $this->sessionLogin,
            'courseList' => $courseList,
        ));
    }

}
