<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $met = 'required|string';
        if($this->method() == 'PUT'){
            $met = 'required|string ' . $this->id;

        }
        return [
            'name'=>$met,
            'image'=>'image|mimes:jpeg,png,jpg,gif'
        ];
    }
}
