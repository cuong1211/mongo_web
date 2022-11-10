<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        return ['name' => 'required|min:3|max:50'] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store()
    {
        return [
            'name' => 'required|unique:companies|max:255',
            'phone' => 'required|unique:companies|max:12',
            'email' => 'required|unique:companies|max:255',
            'address' => 'required|max:255',
        ];
    }

    protected function update()
    {
        return [
            'name' => 'required|unique:companies|max:255',
            'phone' => 'required|unique:companies|max:12',
            'email' => 'required|unique:companies|max:255',
            'address' => 'required|max:255',
        ];
    }
}
