<?php
namespace App\Rules\Password;

class DoesNotContainSequence extends PasswordInspection
{

    public function inspect ($attributes, $value)
    {
        $increment = 0;
        $decrement = 0;
        
        for ( $key = 1; $key < strlen($value); $key ++) {
            $actual = ord(strtolower($value[$key]));
            
            $previous = ord(strtolower($value[$key - 1]));
            
            $increment = ($actual == $previous + 1) ? $increment + 1 : 0;
            
            $decrement = ($actual == $previous - 1) ? $decrement + 1 : 0;
            
            if ( $increment == 3 || $decrement == 3 ) {
                return $this->success = false;
            }
        }
    }

    public function message ()
    {
        return 'Senha não pode conter uma sequência de caracteres.';
    }
}
