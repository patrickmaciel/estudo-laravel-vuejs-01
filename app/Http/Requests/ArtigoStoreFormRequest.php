<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtigoStoreFormRequest extends FormRequest
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
            'titulo' => 'required|max:140',
            'descricao' => 'required|max:300',
            'conteudo' => 'required',
            'data' => 'required|date'
        ];
    }

    public function sanitize()
    {
        $attributes = parent::all();

        $attributes['data'] = dateBrToDb($attributes['data']);

        $this->replace($attributes);
    }

//    public function messages()
//    {
//        return [
//          'titulo.required' => 'Título obrigatório'
//        ];
//    }
}
