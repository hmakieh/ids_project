<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPreferencesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email_notifications' => 'boolean',
            'weekly_digest' => 'boolean',
        ];
    }
}