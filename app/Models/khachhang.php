<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    public $timestamps = false;
    protected $fillable = ['id_KH', 'HoTenKH','Email_KH', 'MatKhau_KH', 'SoDienThoai_KH'];

    protected $primaryKey = 'id_KH';

    protected $table = 'khachhang';
}
