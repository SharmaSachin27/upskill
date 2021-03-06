<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        
        $id = 'NULL';
        if ($this->id) {
            $id = (int)$this->id;
        }
        return [
            //
            'firstname' =>  'required',
            'lastname' => 'required',
            'email' => 'required|unique:employee,email,' . $id . ',id',
            'company_id' => 'required'
        ];
    }
}
