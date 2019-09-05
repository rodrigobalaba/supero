<?php
namespace App\Rules\Password;

class DoesNotContainBirthdate extends PasswordInspection
{

    public function inspect ($attributes, $value)
    {
        $birthdate = array_get($attributes, 'pes_dat_nas');
        
        $birthdates = collect(
                [
                        $birthdate,
                        substr($birthdate, 0, 6) . substr($birthdate, - 2),
                        str_replace('/', '', $birthdate),
                        str_replace('/', '', substr($birthdate, 0, 6) . substr($birthdate, - 2))
                ]);
        
        $this->success = $birthdates->contains(
                function ($birthdate) use ( $value)
                {
                    return str_contains(strtolower($value), strtolower($birthdate));
                }) == false;
    }

    public function message ()
    {
        return 'Senha não pode conter a sua data de nascimento.';
    }
}
