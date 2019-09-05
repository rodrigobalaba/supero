<?php
namespace App\Rules\Password;

use App\Rules\RemoveAccent;

class DoesNotContainName extends PasswordInspection
{

    protected $success;

    public function inspect ($attributes, $value)
    {
        $strings = collect(explode(' ', array_get($attributes, 'pes_nom')));
        
        $this->success = $strings->contains(
                function ($string) use ( $value)
                {
                    return str_contains(strtolower(RemoveAccent::remove($value)), strtolower(RemoveAccent::remove($string)));
                }) == false;
    }

    public function message ()
    {
        return 'Senha não pode conter seu nome.';
    }
}
