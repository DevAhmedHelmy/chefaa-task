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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'image'=>'nullable',
            'prices'=>'nullable|array',
            'pharmacies'=>'nullable|array',
            'pharmacies.*'=>'nullable|exists:pharmacies,id',
            'quantities'=> 'nullable|array',
        ];
    }
}
