<?php
namespace App\Rules\Password;

class DoesNotContainCpf extends PasswordInspection
{

    public function inspect ($attributes, $value)
    {
        $cpf = array_get($attributes, 'pes_cpf');
        
        $cpfs = collect(
                [
                        $cpf,
                        str_replace("-", "", $cpf),
                        str_replace(".", "", $cpf),
                        str_replace("/", "", $cpf),
                        str_replace(".", "", str_replace("-", "", str_replace("/", "", $cpf)))
                ]);
        
        $this->success = $cpfs->contains(
                function ($cpf) use ( $value)
                {
                    return str_contains(strtolower($value), strtolower($cpf));
                }) == false;
    }

    public function message ()
    {
        return 'Senha não pode conter seu CPF';
    }
}
