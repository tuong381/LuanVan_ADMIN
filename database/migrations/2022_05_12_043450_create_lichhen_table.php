<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichhenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichhen', function (Blueprint $table) {
            $table->increments('id_LichHen');
            $table->integer('id_DichVu');
            $table->integer('id_NhanVien');
            $table->integer('id_KhachHang');
            $table->date('NgayDK');
            $table->text('GioDK');
            $table->double('TongTien');
            $table->integer('TrangThaiLichHen');
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
        Schema::dropIfExists('lichhen');
    }
}
