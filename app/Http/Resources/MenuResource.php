<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'parent_id' => $this->parent_id,
            'text_menu' => $this->text_menu,
            'url' => $this->url,
            'active' => $this->active,
            'icon' => $this->icon,
            'childs' => $this->childs,
            'created_by' => $this->createdBy,
        ];
    }
}
