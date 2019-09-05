<?php

namespace App\Rules\Password;

class DoesNotContainPhone extends PasswordInspection 
{
	public function inspect($attributes, $value) 
	{
		$phone = array_get($attributes, 'pes_tel_res');
		
		$phones = collect ( [ 
			$phone,
			str_replace ("-", "", $phone),
			str_replace (".", "", $phone),
			str_replace ("/", "", $phone),
			str_replace ("(", "", $phone),
			str_replace (")", "", $phone),
			str_replace (" ", "", $phone),
		    str_replace (".", "", str_replace ("-", "", str_replace ("/", "", str_replace("(", "", str_replace(")", "", str_replace(" ", "", $phone))))))
		] );
		
		$this->success = $phones->contains ( function ($phone) use ($value) {
			return str_contains ( strtolower ( $value ), strtolower ( $phone ) );
		} ) == false;
	}
	
	public function message() {
		return 'Senha não pode conter seu telefone residencial';
	}
}
