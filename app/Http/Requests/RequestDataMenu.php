<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDataMenu extends FormRequest
{
    public function rules()
    {
        $rules = array();
        if($this->isMethod('PUT')){
            $id = $this->get('id');
            $rules = [
                'text_menu' => 'required|unique:menu,text_menu,'.$id,
                'parent_menu' => 'nullable',
                'url_menu' => 'required|unique:menu,url,'.$id,
                'status_menu' => 'nullable',
                'icon' => 'required',
            ];
        } else if($this->isMethod('POST')){
            $rules = [
                'text_menu' => 'required|unique:menu,text_menu',
                'parent_menu' => 'nullable',
                'url_menu' => 'required|unique:menu,url',
                'status_menu' => 'nullable',
                'icon' => 'required',
            ];
        }

        return $rules;
    }

    public function messages()
    {

        $messages = array();
        $messages = [
            'text_menu.required' => 'Text Menu Wajib Diisi !',
            'url_menu.required' => 'Url Menu Wajib Diisi !',
            'icon.required' => 'Icon Menu Wajib Diisi !',
        ];
        return $messages;
    }
}
