<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'username' => 'required|string|max:191|unique:users',
            'email' => 'required|email|max:191|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required|exists:roles,id',
            'profile_picture' => 'nullable|string|max:255'
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['username'] = 'required|string|max:191|unique:users,username,' . $this->user->id;
            $rules['email'] = 'required|email|max:191|unique:users,email,' . $this->user->id;
            $rules['password'] = 'nullable|min:8';
        }

        return $rules;
    }
}
