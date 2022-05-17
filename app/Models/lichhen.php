<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lichhen extends Model
{
    public $timestamps = false;
    protected $fillable = ['id_LichHen', 'id_DichVu','id_NhanVien','id_KhachHang','NgayDK', 'GioDK','TongTien',
                             'TrangThaiLichHen' ];

    protected $primaryKey = 'id_LichHen';

    protected $table = 'lichhen';

    public function nhanvien(){
        return $this->hasMany('App\modal\nhanvien','id_NhanVien');
    }
}
