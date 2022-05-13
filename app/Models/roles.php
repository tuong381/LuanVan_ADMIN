<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    public $timestamps = false;
    protected $fillable = ['TenRoles'];

    protected $primaryKey = 'id_Roles';

    protected $table = 'roles';

    public function admin(){
        return $this->belongsToMany('App\Models\admin');
    }
}
