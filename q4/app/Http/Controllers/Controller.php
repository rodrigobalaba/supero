<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function reformatPasswordValidationErrors($errors)
    {
        $pes_senha = array_get($errors, 'pes_senha');
        
        $password = $pes_senha ? [
            'pes_senha' => array_flatten($pes_senha)
        ] : [];
        
        return [
            'errors' => array_except($errors, 'pes_senha') + $password
        ];
    }
}
