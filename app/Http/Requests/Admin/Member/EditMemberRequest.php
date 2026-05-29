<?php

namespace App\Http\Requests\Admin\Member;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditMemberRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'max:255',
                Rule::unique('members', 'email')->ignore($this->route('member')->id),
            ],
            'phone' => [
                'required',
                'digits_between:10,16',
                Rule::unique('members', 'phone')->ignore($this->route('member')->id),
            ],
            'status' => [
                'string',
            ],
        ];

        }
      public function attributes(): array {
        return [
            'fullname' => 'Nama Lengkap',
            'phone' => 'Nomor Handphone',
            'email'=> 'Email',
         ];
    }
}
