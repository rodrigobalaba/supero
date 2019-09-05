<?php
namespace App\Rules\Password;

class ContainsNumberAndLetters extends PasswordInspection
{

    public function inspect ($attributes, $value)
    {
        $this->success = preg_match('/(?=.*\d)(?=.*[a-zA-Z]).+/', $value) > 0;
    }

    public function message ()
    {
        return 'Senha deve conter números e letras.';
    }
}
