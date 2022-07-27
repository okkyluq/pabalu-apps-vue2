<?php

namespace Modules\Kategori\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kategori', 'keterangan', 'created_by'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
