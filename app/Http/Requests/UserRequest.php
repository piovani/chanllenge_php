<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->user ? $this->user->id : '';

        return [
            'full_name' => ['required', 'string', 'max:255'],
            'document' => ['required', 'string', 'max:14', 'unique:users,document,' . $id],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:users,email,' . $id],
            'password' => ['required', 'string', 'max:255'],
        ];
    }
}
