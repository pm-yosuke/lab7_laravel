<?php

namespace App\Http\Requests\MyWork;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\ValidationErrorResponseCustomizer;

class Store extends FormRequest
{
    use ValidationErrorResponseCustomizer;

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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:256',
            'reward' => 'required|integer',
            'description' => 'required|max:256',
            'entry_end_at' => 'date',
        ];
    }
}
