<?php

namespace Webkul\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserForm extends FormRequest
{
    protected $rules;

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


        // dd($this->input()); For All Inputs


        $role = $this->input('role_name');

        // For Whole Seller

        if($role == 'whole seller' )
        {
//              dd($this->input());
            // dd("hello");
            $this->rules = [
                'name'     => 'required',
                'email'    => 'required|email|unique:admins,email',
                'password' => 'nullable',
                'address'     => 'required',
                'country'     => 'required',
                'city'     => 'required',
                'password_confirmation' => 'nullable|required_with:password|same:password',
                'status'   => 'sometimes',
                'role_name'  => 'required',
                'company_name'  => 'required',
                'website'  => 'required',
                'company_address'  => 'required',
                'company_city'  => 'required',
                'company_country'  => 'required',
                'nef_tax_no' => 'required',

            ];

        }

        // For Driver

        else if($role == 'driver' )
        {
            $this->rules = [
                'name'     => 'required',
                'email'    => 'required|email|unique:admins,email',
                'password' => 'nullable',
                'address'     => 'required',
                'country'     => 'required',
                'city'     => 'required',
                'password_confirmation' => 'nullable|required_with:password|same:password',
                'status'   => 'sometimes',
                'role_name'  => 'required',
                'vehicle_name'  => 'required',
                'vehicle_no'  => 'required',
                'working_area'  => 'required',
                'working_city'  => 'required',
                'working_country'  => 'required',

            ];

        } else {
            $this->rules = [
                'name'     => 'required',
                'email'    => 'required|email|unique:admins,email',
                'password' => 'nullable',
                'password_confirmation' => 'nullable|required_with:password|same:password',
                'status'   => 'sometimes',
                'role_name'  => 'required',
                'address'     => 'required',
                'country'     => 'required',
                'city'     => 'required',
            ];
        }



        if ($this->method() == 'PUT') {
            $this->rules['email'] = 'email|unique:admins,email,' . $this->route('id');
        }

        return $this->rules;
    }


//    public function messages()
//    {
//        return [
//            'required' =>'This Field is Required',
//
//        ];
//    }

}
