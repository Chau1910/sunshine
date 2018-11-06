<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMauSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_sanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('m_ma');
            $table->unsignedSmallInteger('msp_soLuong')
                ->default('0')
                ->comment('So luong mau san pham');
            
            $table->primary(['sp_ma','m_ma']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mau_sanpham');
    }
}
