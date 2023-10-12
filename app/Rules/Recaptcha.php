<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

    }
    public function passes($attribute, $value)
    {
        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => '6LeIrzklAAAAAHKGnw1T5kYqfgF2SkhlKrOAF7YH',
                'response' => $value
            ]
        )->object();

        if($response->success){
            return true;
        }

        return "false";
    }

    public function message()
    {
        return 'El usuario es un embecel';
    }
}
