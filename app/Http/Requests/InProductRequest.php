<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InProductRequest extends FormRequest
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
        return ['name' => 'min:3|max:50'] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store()
    {
        return [
        'image' => 'nullable',
        'product_id' => 'required',
        'company_id' => 'required',
        'quantity' => 'required',
        'total' => 'required',
        ];
    }

    protected function update()
    {
        return [
        'name' => 'required|unique:in_products|max:255',
        ];
    }
}
