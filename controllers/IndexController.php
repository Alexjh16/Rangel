<?php


class IndexController{
    public function index(){
        require_once('views/all/index.php');
    }
    public function login(){
        require_once('views/login/index.php');
    }
    public function instructor(){
        require_once('views/instructor/index.php');
    }
    
    public function contacto(){
        require_once('views/contacto/contacto.php');
    }
}




?>