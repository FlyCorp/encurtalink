<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\NpsLink;

class NpsMonthRating implements Rule
{
    protected $main;
    protected $fields;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($main, $fields)
    {
        $this->main = $main;
        $this->fields = $fields;
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
        return !NpsLink::where($this->main, $value)
        ->where("config_gateway", $this->fields["config_gateway"])
        ->where("config_number", $this->fields["config_number"])
        ->where("created_at", ">=",now()->subMonths(3)->format('Y-m-d'))
        ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Cliente contemplado na campanha informada, nos ultimos 3 meses";
    }
}
