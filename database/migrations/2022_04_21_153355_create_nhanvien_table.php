<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
           $table->increments('id_NhanVien');
            $table->string('TenNV');
            $table->string('Email');
            $table->string('SoDienThoai',30);
            $table->string('DiaChi');
            $table->string('MatKhau');
            $table->string('AnhDaiDien');
            $table->string('KinhNghiem');
            $table->date('NgaySinh');
            $table->string('GioiTinh');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
