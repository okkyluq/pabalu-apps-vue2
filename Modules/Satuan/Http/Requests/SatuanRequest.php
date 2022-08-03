<?php

namespace Modules\Satuan\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SatuanRequest extends FormRequest
{

    public function rules()
    {
        $rules = array();
        $request = Request::instance();
        if($this->isMethod('PUT')){
            $id = $request->id;
            $rules = [
                'satuan' => 'required|unique:satuan,satuan,'.$id,
                'keterangan' => 'required',
            ];
        } elseif($this->isMethod('POST')) {
            $rules = [
                'satuan' => 'required',
                'keterangan' => 'required',
            ];
        }
        return $rules;
    }

    public function messages()
    {
        $message = [
            'satuan.required' => 'Satuan Wajib Di Isi',
            'keterangan.required' => 'Keterangan Wajib Di Isi',
        ];
        return $message;
    }


}
