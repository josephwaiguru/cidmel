<?php

class Courses extends DataMapper {

    function __construct() {
        parent::__construct();
    }

    function getAllCourses() {
        $list = $this->get();
        foreach ($list as $course) {
            $retval[] = $course;
        }
        return $retval;
    }
    
    function delete() {
    }

}
