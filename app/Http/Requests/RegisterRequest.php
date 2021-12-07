<?php

namespace App\Http\Requests;

use App\Http\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

/**
 * @property mixed $name
 * @property mixed $email
 * @property mixed $password
 * @property mixed $c_password
 * @property mixed $password_confirmation
 */
class RegisterRequest extends FormRequest
{
    public function rules(): array
    {

        return [
            'name' => ['required'],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required','confirmed'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
