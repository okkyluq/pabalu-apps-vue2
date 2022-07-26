<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'parent_id', 'text_menu', 'url', 'active', 'icon', 'created_by', 'deleted_at'
    ];

    protected $appends = array('SlugMenu');

    public function getSlugMenuAttribute()
    {
        return Str::slug($this->text_menu, '_');
    }


    public function otoritas_menu()
    {
        return $this->hasOne('App\Models\OtoritasMenu', 'menu_id', 'id');
    }

    public function parent() {
        return $this->belongsTo('App\Modesl\Menu','parent_id','id') ;
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Menu','parent_id','id') ;
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
