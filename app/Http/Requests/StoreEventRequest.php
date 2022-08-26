<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            "title" => ["string", "required"],
            "status" => ["required", Rule::in( ["published","private","public"] ) ],
            'startDate' => ["required"],
            'endDate' => ["required"]
        ];
    }

    /** @todo extra validation rules required */
    protected function prepareForValidation()
    {
      return   $this->merge([
          'user_id' => $this->userId,
          'start_date' => $this->startDate,
          'end_date' => $this->endDate
          ]

        );
    }

}
