<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ApprovedStatus implements Rule
{
    public function passes($attribute, $value)
    {
        return $value === 'approved';
    }

    public function message()
    {
        return 'The :attribute must be approved.';
    }
}
