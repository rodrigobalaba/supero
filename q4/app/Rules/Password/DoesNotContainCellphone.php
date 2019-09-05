<?php
namespace App\Rules\Password;

class DoesNotContainCellphone extends PasswordInspection
{

    public function inspect ($attributes, $value)
    {
        $cellphone = array_get($attributes, 'pes_tel_cel');
        
        $cellphones = collect(
                [
                        $cellphone,
                        str_replace("-", "", $cellphone),
                        str_replace(".", "", $cellphone),
                        str_replace("/", "", $cellphone),
                        str_replace("(", "", $cellphone),
                        str_replace(")", "", $cellphone),
                        str_replace(" ", "", $cellphone),
                        str_replace(".", "", str_replace("-", "", str_replace("/", "", str_replace("(", "",  str_replace(")", "", str_replace(" ", "", $cellphone))))))
                ]);
        
        $this->success = $cellphones->contains(
                function ($cellphone) use ( $value)
                {
                    return str_contains(strtolower($value), strtolower($cellphone));
                }) == false;
    }

    public function message ()
    {
        return 'Senha não pode conter seu telefone celular';
    }
}
