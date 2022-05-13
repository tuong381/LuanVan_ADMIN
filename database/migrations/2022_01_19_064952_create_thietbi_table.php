<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThietbiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thietbi', function (Blueprint $table) {
             $table->increments('MaTB');
            $table->integer('MaLoaiTB');
            $table->string('TenThietBi');
            $table->text('MoTaThietBi');
            $table->integer('Gia');
            $table->string('HinhAnh');
            $table->string('XuatXu');
            $table->integer('SoLuong');
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
        Schema::dropIfExists('thietbi');
    }
}
