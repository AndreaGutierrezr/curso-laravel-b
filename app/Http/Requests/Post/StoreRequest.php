<?php

namespace App\Http\Requests\Post;

use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            //'slug'=> Str::slug($this->title)
            //'slug' => Str::of($this->title)->slug()
            //'slug' => Str::of($this->title)->slug()->append("-adicional")
            'slug' => str($this->title)->slug()
        ]);
    }

    // static public function myRules(){
    //     return [
    //         "title" => "required|min:5|max:500",
    //         "slug" => "required|min:5|max:500",
    //         "description" => "required|min:7", 
    //         "content" => "required|min:7",
    //         "posted" => "required", 
    //         "category_id" => "required|integer"
    //     ];
    // }

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
            "title" => "required|min:5|max:500",
            "slug" => "required|min:5|max:500|unique:posts",
            "description" => "required|min:7", 
            "content" => "required|min:7",
            "posted" => "required", 
            "category_id" => "required|integer"
        ];
        // return $this->myRules();
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){
        if($this->expectsJson()){
            $response = new Response($validator->errors(), 422);
            throw new ValidationException($validator, $response);
        }
    }
}
