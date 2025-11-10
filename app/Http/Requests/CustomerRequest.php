<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{
    public function rules() : array
    {
        return [
            'name' => 'required',
            'reference' => ['required', Rule::unique('customers', 'reference')->ignore($this->id)],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'start_date' => 'nullable|date',
            'description' => 'nullable'
        ];
    }
}
