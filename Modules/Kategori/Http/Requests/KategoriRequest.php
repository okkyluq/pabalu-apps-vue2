<?php

namespace Modules\Kategori\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
{
    public function rules()
    {
        $rules = array();
        $request = \Request::instance();
        if($this->isMethod('PUT')){
            $id = $request->id;
            $rules = [
                'kategori' => 'required',
                'keterangan' => 'required',
            ];
        } else if($this->isMethod('POST')){
            $rules = [
                'kategori' => 'required',
                'keterangan' => 'required',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        $messages = array();
        $messages = [
            'kategori.required' => 'Kategori Wajib Di Isi !',
            'keterangan.required' => 'Keterangan Wajib Di Isi !!',
        ];
        return $messages;
    }
}
