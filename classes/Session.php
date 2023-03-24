<?php 
class Session {


    public function logOut()    
    {   
        session_destroy();
        redirect('login.php');
    }

    public function logIn(){
        session_start();
    }
}

