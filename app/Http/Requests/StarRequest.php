<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StarRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'firstname' => trim(strip_tags($this->firstname)),
            'lastname' => trim(strip_tags($this->lastname)),
            'description' => trim(strip_tags($this->description)),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|min:3|max:100',
            'lastname' => 'required|min:3|max:100',
            'description' => 'required|min:100',
            'photo' => 'file|max:2048|mimes:jpeg,jpg,png',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'firstname.required' => 'Le champs prénom est obligatoire',
            'firstname.min' => 'Le champs prénom doit comporter 3 caractères minimum',
            'firstname.max' => 'Le champs prénom doit comporter 100 caractères maximum',
            'lastname.required' => 'Le champs nom est obligatoire',
            'lastname.min' => 'Le champs nom doit comporter 3 caractères minimum',
            'lastname.max' => 'Le champs nom doit comporter 100 caractères maximum',
            'description.required' => 'Le champs description est obligatoire',
            'description.max' => 'Le champs description doit comporter 100 caractères maximum',
            'photo.max' => 'La photo ne doit pas faire plus de 2 Mo',
            'photo.mimes' => 'La photo doit être au format jpg ou png',
        ];
    }
}
