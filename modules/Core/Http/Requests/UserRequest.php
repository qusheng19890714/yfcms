<?php

namespace Modules\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if ($this->method() == 'PUT') {

            return [

                'username'  => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,username,' . Auth::id(),
                'email' => 'required|email',
                'sign'  => 'max:80',
            ];

        }else {

            return [];
        }



    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
