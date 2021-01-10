<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Address_validation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(Str::contains($value, ['`', '¬', '¦', '!', '"', '£', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '=', '{', '}', ':', ';', '@', "'", '~', '#', '|', ',', '<', '.', '>', '/', '?'])) {
            return false;
        }
        if(Str::of('[0-9]')->before(' [a-z]')) {
            return true;
        }

        if(!Str::contains($value, [' '])) {
            return false;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please provide a valid address';
    }
}
