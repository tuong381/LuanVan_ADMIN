<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    public $timestamps = false;
    protected $fillable = ['id_NhanVien', 'TenNV','Email','DiaChi','GioiTinh', 'SoDienThoai','HinhAnh',
                             'MatKhau', 'NgaySinh', 'KinhNghiem' ];

    protected $primaryKey = 'id_NhanVien';

    protected $table = 'nhanvien';
}
