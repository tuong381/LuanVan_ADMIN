<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->increments('id_HD');
            $table->Integer('id_KhachHang');
            $table->Integer('id_SanPham');
            $table->Integer('id_LichHen');
            $table->string('TenSanPham');
            $table->string('TenVe');
            $table->double('TongHoaDon');

            $table->datetime("Ngay");
             $table->Integer('TrangThaiHoaDon');
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
        Schema::dropIfExists('hoadon');
    }
}
