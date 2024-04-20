<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'title' =>  'required|min:3|max:100',
            'body' =>  'required|min:10|max:1000',
            'image'=> $this->route('slug') ? 'image|mimes:png,jpg,jpeg|max:2048' : 'required|image|mimes:png,jpg,jpeg|max:2048',//ila kan slug madirch required hit ghiir modification blax mn required
                    

        ];
    }
}
