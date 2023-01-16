<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class movieRequest extends FormRequest
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
    public function rules() // بكتب الرولز اللي بدي اساها عبارة عن اسم الحقل والتحقق اللي بدي يتم عليه
    {
        return [
            'movie_name' => 'required|max:5',
            'movie_description' => 'required',
            'movie_genre' => 'required'
        ];
    }

// للتحكم بصيغة المسج اللي راح يطلع
public function messages()
{
    return [
        'movie_name.required' => 'A title is required',
        'movie_name.max' => 'A title is 5 digits maximum',
        'movie_description.required' => 'A message is required',
        'movie_genre.required' => 'A message is required',
    ];
}

// في حال بدك يحافظ على البيانات القديمة لما يصير عنده خطا وما يرجع يعيد الكتابة من البداية
//value="{{ old('title')}}
}
