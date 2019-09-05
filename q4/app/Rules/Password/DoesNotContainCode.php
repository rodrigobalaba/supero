<?php
namespace App\Rules\Password;

class DoesNotContainCode extends PasswordInspection
{

    public function inspect ($attributes, $value)
    {
        $code = array_get($attributes, 'pes_cod_comp');
        
        $codes = collect(
                [
                        $code,
                        str_replace("-", "", $code),
                        str_replace(".", "", $code),
                        str_replace("/", "", $code),
                        str_replace("(", "", $code),
                        str_replace(")", "", $code),
                        str_replace(" ", "", $code),
                        str_replace(".", "", str_replace("-", "", str_replace("/", "", str_replace("(", "", str_replace(")", "", str_replace(" ", "", $code))))))
                ]);
        
        $this->success = $codes->contains(
                function ($code) use ( $value)
                {
                    return str_contains(strtolower($value), strtolower($code));
                }) == false;
    }

    public function message ()
    {
        return 'Senha não pode conter seu código de pessoa.';
    }
}
