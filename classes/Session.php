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

}

