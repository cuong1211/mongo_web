<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return ['name' => 'max:50'] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store()
    {
        return [
            'name' => 'nullable| unique:products|max:255',
            'description' => 'nullable',
            'price' => 'nullable',
            'category_id' => 'nullable',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    protected function update()
    {
        return [
            'name' => 'required|unique:products|max:255',
            'description' => 'nullable',
            'price' => 'required',
            'category_id' => 'required',
        ];
    }
}
