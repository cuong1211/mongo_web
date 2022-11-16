<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PharIo\Manifest\Email;

class OrderRequest extends FormRequest
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
        'name' => 'required|max:255',
        'email' => 'nullable|email',
        'address' => 'required',
        'phone' => 'required|numeric',
        'note' => 'required',
        'product_id' => 'required',
        'quatity '=> 'nullable|numeric',
        'total' => 'required',
        'date' => 'required',
        'status' => 'required',
        ];
    }

    protected function update()
    {
        return [
        'name' => 'required|unique:posts|max:255',
        'description' => 'nullable',
        'price'=>'required'
        ];
    }
}