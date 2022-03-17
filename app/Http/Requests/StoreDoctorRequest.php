<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreDoctorRequest extends FormRequest
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
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|unique:doctors,username|max:50',
            'email' => 'required|email|unique:doctors,email',
            'password' => 'required|string|max:255',
            'dob' => 'required:date_format:Y-mm-dd',
            'gender' => 'required|in:F,M',
            'address' => 'nullable|string',
            'country' => 'nullable|string',
            'state' => 'nullable|string',
            'city' => 'nullable',
            'phone' => 'required|max:255',
            'image' => 'required|image',
            'short_bio' => 'nullable|string',
            'status' => 'required|boolean',
            'user_id' => 'nullable',
            'created_by_id' => 'nullabled|exists:users,id',
            'updated_by_id' => 'nullable|exists:users,id',
        ];
    }
}
