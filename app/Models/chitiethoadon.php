<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitiethoadon extends Model
{
     public $timestamps = false;
    protected $fillable = ['id_CTHD','id_HD', 'id_SanPham','TenSanPham', 'Gia', 'SoLuongMua'];

    protected $primaryKey = 'id_CTHD';

    protected $table = 'chitiethoadon';

    public function sanpham(){
        return $this->belongsTo('App\modal\sanpham','id_SanPham');
    }
}
