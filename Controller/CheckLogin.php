<?php
    spl_autoload_register(function($className) {
        $file = '../modal/'.$className.'.php';
        require $file;
    });
    checkLogin();
    function checkLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(User::login($email,$password)){
            echo 'true';
        }else {
            echo 'false';
        }
    }