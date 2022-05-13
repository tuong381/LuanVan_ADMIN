<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dathang extends Model
{
     public $timestamps = false;
    protected $fillable = ['id_DH','TenDatHang', 'Email_DH','DiaChi_DH', 'SoDienThoai_DH', 'GhiChu_DH'];

    protected $primaryKey = 'id_DH';

    protected $table = 'dathang';
}
