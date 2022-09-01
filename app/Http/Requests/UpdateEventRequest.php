<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEventRequest extends FormRequest
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

    public function rules():array
    {

        $method = $this->method();
        if($method == 'PUT') {
            return [
                "title" => ["string", "required"],
                "status" => ["required", Rule::in( ["published","private","public"] ) ],
                'endDate' => ["required"],
                'startDate' => ["required"],
                'user_id' => ["required"]
            ];
        }else{
            return [
                "title" => ["string", "required" , "sometimes"],
                "status" => ["required", Rule::in( ["published","private","public"] ) ,  "sometimes"],
                'startDate' => ["required","sometimes"],
                'endDate' => ["required",  "sometimes"],
                'user_id' => ["required", "sometimes"]
            ];
        }

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
