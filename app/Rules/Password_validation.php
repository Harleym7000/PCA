<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Password_validation implements Rule
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
        $this->lengthPasses = Str::length($value) >= 10;
        $this->containsCapital = Str::lower($value) == $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        switch (true) {
            case !$this->lengthPasses:
            return 'Passwords must be at least 8 characters in length.';

            case !$this->containsCapital:
                return 'Passwords must have at least 1 capital letter.';

            case !$this->lengthPasses && !$this->containsCapital: 
                return 'Passwords must be at least 8 characters in length and have at least 1 capital letter';
            }
            
        }
}