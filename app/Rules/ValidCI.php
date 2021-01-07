<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Traits\ValidateCI;

class ValidCI implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $validator = new ValidateCI;
        $value = $validator->validate_ci($value);
        return $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El campo :attribute no es válido.';
    }
}