<?php

namespace Modules\Education\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class GreaterThan implements Rule
{
    private $date;
    private $compared;
    private $attribute;
    private $attribute_title;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($compared,$attribute_title,Carbon $date)
    {
        $this->date = $date;
        $this->compared = $compared;
        $this->attribute_title = $attribute_title;

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
        $value = Carbon::parse($value);
        $this->attribute = $attribute;
        return $this->date->gt($value);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->attribute_title . " باید قبل از {$this->compared} باشد";
    }
}
