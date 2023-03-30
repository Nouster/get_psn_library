<?php

namespace App;

class User {

    private string $pseudo;
    private string $pass;

    public function __construct(string $pseudo,string $pass)
    {
        $this->pseudo = $pseudo;
        $this->pass = $pass;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getPass()
    {
        return $this->pass;
    }
}
