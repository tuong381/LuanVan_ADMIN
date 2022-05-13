<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    public $timestamps = false;
    protected $fillable = ['id_SanPham', 'id_DanhMuc','TenSanPham', 'MoTaSanPham', 'Gia','SoLuong_SP','SoLuong_SPDaBan','HinhAnh'];

    protected $primaryKey = 'id_SanPham';

    protected $table = 'sanpham';
}
