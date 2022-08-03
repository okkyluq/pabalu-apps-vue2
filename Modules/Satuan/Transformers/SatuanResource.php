<?php

namespace Modules\Satuan\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SatuanResource extends JsonResource
{

    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'satuan' =>  $this->satuan,
            'keterangan' =>  $this->keterangan,
            'created_by' => $this->createdBy,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
