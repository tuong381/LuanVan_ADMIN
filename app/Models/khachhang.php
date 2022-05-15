<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    public $timestamps = false;
    protected $fillable = ['id_KhachHang', 'TenKH','Email','DiaChi','GioiTinh', 'SoDienThoai','HinhAnh',
                             'MatKhau', 'NgaySinh', 'ChieuCao', 'CanNang' ];

    protected $primaryKey = 'id_KH';

    protected $table = 'khachhang';
}
