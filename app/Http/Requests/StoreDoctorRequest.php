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
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'username' => 'required|unique:doctors|max:50',
            'email' => 'required|unique:doctors',
            'password' => 'required',
            'dob' => 'nullable',
            'gender' => 'required',
            'address' => 'nullable',
            'country' => 'nullable',
            'state' => 'nullable',
            'city' => 'nullable',
            'phone' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_bio' => 'nullable',
            'status' => 'nullable',
            // 'user_id' => 'nullable',
            // 'created_by_id' => 'nullable',
            // 'updated_by_id' => 'nullable',
        ];
    }
}
