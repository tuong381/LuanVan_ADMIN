<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thuvienhinhanh extends Model
{
     public $timestamps = false;
    protected $fillable = ['id_HinhAnh','FileHinhAnh', 'id_SanPham'];

    protected $primaryKey = 'id_HinhAnh';

    protected $table = 'thuvienhinhanh';
}
