<?php
namespace App\Rules\Password;

abstract class PasswordInspection
{

    protected $success;

    public function __construct ()
    {
        $this->success = true;
    }

    public function fails ()
    {
        return $this->success == false;
    }

    public function message ()
    {
        return '';
    }
}