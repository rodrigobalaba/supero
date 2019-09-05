<?php
namespace App\Rules\Password;

class DoesNotContainRG extends PasswordInspection
{

    public function inspect ($attributes, $value)
    {
        $rg = array_get($attributes, 'pes_rg');
        
        $rgs = collect(
                [
                        $rg,
                        str_replace("-", "", $rg),
                        str_replace(".", "", $rg),
                        str_replace("/", "", $rg),
                        str_replace(".", "", str_replace("-", "", str_replace("/", "", $rg)))
                ]);
        
        $this->success = $rgs->contains(
                function ($rg) use ( $value)
                {
                    return str_contains(strtolower($value), strtolower($rg));
                }) == false;
    }

    public function message ()
    {
        return 'Senha não pode conter seu RG.';
    }
}
