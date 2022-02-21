<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            //
            'title' => ['required','min:3','string',Rule::unique('posts')->ignore($this->route()->post)],
            'description' => 'required|min:10|string',
            'user_id'=>['required',Rule::exists('users','id')]
            
        ];
    }
}