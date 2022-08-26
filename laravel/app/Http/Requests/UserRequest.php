<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->isMethod('POST') ? $this->store() : $this->update();
    }

    public function store()
    {
        return [
            'name'      => 'required|unique:users,name',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|same:confirm-password',
            'roles'     => 'required',
        ];
    }


    public function update()
    {
        return [
            'name'      => 'required|unique:users,name,'.$this->id,
            'email'     => 'required|email|unique:users,email,'.$this->id,
            'password'  => 'required|same:confirm-password',
            'roles'     => 'required',
        ];
    }
}
