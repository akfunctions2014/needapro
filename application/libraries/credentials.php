<?php

class Credentials
{

    public $newPasswordString;
    public $newSaltString;
    public $newHashedPasswordString;
    public $newHashedSalt;
    public $newHashedPassword;
    public $newUsername;

    public function __construct()
    {
        $this->newUsername = uniqid();
        $this->newPasswordString = uniqid();
        $this->newSaltString = uniqid();
        $this->newHashedPasswordString = hash("sha512", $this->newPasswordString);
        $this->newHashedSalt = hash("sha512", $this->newSaltString);
        $this->newHashedPassword = hash("sha512", $this->newHashedSalt . $this->newHashedPasswordString);
    }

}
