<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtoritasMenu extends Model
{
    protected $table = 'otoritas_menu';
    protected $primaryKey = 'id';
    protected $fillable = ['menu_id', 'view', 'create', 'edit', 'delete', 'export', 'import'];
}
