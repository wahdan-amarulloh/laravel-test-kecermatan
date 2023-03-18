<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DetailArrayValuesDistinct implements Rule
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
        $allValues = collect($value[0])->except(['name'])->flatten();

        return $allValues->count() === $allValues->unique()->count();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The detail array values for A, B, C, D, and E must be distinct within each detail array.';
    }
}
