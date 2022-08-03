<?php

namespace Modules\Satuan\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Satuan extends Model
{
    use SoftDeletes;
    protected $table = 'satuan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'satuan', 'keterangan', 'created_by'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
