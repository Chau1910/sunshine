<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('dh_ma')
                ->autoIncrement()
                ->comment('Ma don hang');
            
            $table->unsignedBigInteger('kh_ma')
                ->comment('Ma don hang');

            $table->dateTime('dh_thoiGianDatHang')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi gia dat hang don hang');
            
            $table->dateTime('dh_thoiGianNhanHang')
                ->comment('Thoi gia nhan hang don hang');

            $table->string('dh_nguoiNhan',100)
                ->comment('Nguoi nhan trong don hang');

            $table->string('dh_diachi',250)
                ->comment('Dia chi nguoi nhan trong don hang');
            
            $table->string('dh_dienThoai',11)
                ->comment('Dien thoai nguoi nhan trong don hang');

            $table->string('dh_nguoiGui',250)
                ->comment('Nguoi gui trong don hang');

            $table->text('dh_loiChuc')
                ->nullable()
                ->comment('Loi chuc cua nguoi gui');
            
            $table->unsignedInteger('dh_daThanhToan')
                ->default('0');
            
            $table->unsignedSmallInteger('nv_xuly')
                ->default('1')
                ->comment('Nhan vien xu ly don hang');
            
            $table->dateTime('dh_ngayXuLy')
                ->nullable()
                ->default('NULL')
                ->comment('Ngay xu ly don hang');

            $table->unsignedSmallInteger('nv_giaohang')
                ->default('1')
                ->comment('Nhan vien giao hang');

            $table->foreign('kh_ma')
                ->references('kh_ma')
                ->on('khachhang');

            $table->foreign('nv_xuLy')
                ->references('nv_ma')
                ->on('nhanvien');

            $table->foreign('nv_giaoHang')
                ->references('nv_ma')
                ->on('nhanvien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
