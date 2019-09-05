<?php
namespace App\Rules\Password;

class DoesNotContainReservedWords extends PasswordInspection
{

    protected $words;

    public function __construct ()
    {
        parent::__construct();
        
        $this->words = collect(
                [
                        "univali",
                        "faculdade",
                        "universidade",
                        "aluno",
                        "professor",
                        "academico"
                ]);
    }

    public function inspect ($attributes, $value)
    {
        $this->success = $this->words->contains(
                function ($word) use ( $value)
                {
                    return str_contains(strtolower($value), strtolower($word));
                }) == false;
    }

    public function message ()
    {
        return 'Senha não pode conter palavra reservada.';
    }
}
