<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'domain.name' => ['required', 'string', 'max:255'],
            'domain.tld' => ['required', 'string', 'max:3']
        ];
    }
}
