<?php

namespace App\Rules;

use App\Session;
use Illuminate\Contracts\Validation\Rule;

class SessionTimeAvailabilityRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($session = null)
    {
        $this->session = $session;
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
       return Session::isTimeAvailable(request()->input('weekday'), $value, request()->input('end_time'), request()->input('course_id'), request()->input('coach_id'), $this->session);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This time is not available';
    }
}
