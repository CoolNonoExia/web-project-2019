<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventAddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string'],
            'date' => ['required', 'string', 'date'],
            'free' => ['boolean'],
            'recurrent' => ['boolean'],
            'image' => ['required', 'image'],
        ];
    }
}
