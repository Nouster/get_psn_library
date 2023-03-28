<?php 

namespace App;

class Session {

    public function __construct()
    {
        session_start();
    }

    public function logOut()    
    {   
        session_destroy();
        redirect('login.php');
    }

    public function unknownUser() :void{
        if(empty($_SESSION)){
            redirect('login.php');
            exit;
        }
    }

}

