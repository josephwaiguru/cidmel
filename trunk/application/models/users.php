<?php

class Users extends DataMapper {

    function __construct() {
        parent::__construct();
    }

    function getAllUsers() {
        $list = $this->get();
        foreach ($list as $user) {
            $retval[] = $user;
        }
        return $retval;
    }

    function isPasswordCorrect($password) {
        return $this->password == sha1(md5($password));
    }

    function delete($id) {
        $this->db->delete('users', array('idusers' => $id));
    }

    function edit() {
        $this->where('idusers', $this->idusers)->update(array(
            'login' => $this->login,
            'password' => $this->password,
            'name' => $this->name,
            'type' => $this->type,
            'language' => $this->language,
        ));
    }

}