<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Cep;

class StoreUpdateCepRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'cep' =>  ['required', 'regex:/^\d{5}-\d{3}$/'],
            'logradouro' => 'required|string',
            'bairro' => 'required|string',
            'localidade' => 'required|string',
            'uf' => 'required|string|size:2', // Sigla do estado com dois caracteres
        ];
        
        return $rules;
    }
}
