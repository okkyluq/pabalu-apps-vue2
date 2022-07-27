<?php

namespace Modules\Kategori\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class KategoriResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'kategori' => $this->kategori,
            'keterangan' => $this->keterangan,
            'created_by' => $this->createdBy,
        ];
    }
}
