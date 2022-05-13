<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    public $timestamps = false;
    protected $fillable = ['id_HD', 'id_SanPham','id_LichHen', 'id_KhachHang','TenSanPham ', 'TenVe','TongHoaDon','TrangThaiHoaDon'];

    protected $primaryKey = 'id_HD';

    protected $table = 'hoadon';
}
