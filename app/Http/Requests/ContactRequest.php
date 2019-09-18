<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ContactRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'email' => 'required|string|email|max:255',
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'phone' => 'required|string|max:25',
            'message' => 'required|string|max:1255',
        ];
    }
}