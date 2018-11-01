<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigInteger('kh_ma')
                ->autoIncrement()
                ->comment('Ma khach hang');
            $table->string('kh_taiKhoan',50)
                ->comment('Tai khoan khach hang');
            $table->string('kh_matKhau',32)
                ->comment('Mat khau khach hang');
            $table->string('kh_hoTen',100)
                ->comment('Ho ten khach hang');
            $table->unsignedInteger('kh_gioiTinh')
                ->default('1')
                ->comment('1:kha dung, 2:khoa');
            $table->string('kh_email',100)
                ->comment('Email khach hang');
            $table->dateTime('kh_ngaySinh')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Ngay sinh khach hang');
            $table->string('kh_diaChi',250)
                ->nullable()
                ->default('NULL')
                ->comment('Dia chi khach hang');
            $table->string('kh_dienThoai',11)
                ->nullable()
                ->default('NULL')
                ->comment('Dien thoai khach hang');
            $table->timestamp('kh_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi khach hang');
            $table->timestamp('kh_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat khach hang gan nhat');
            $table->unsignedTinyInteger('kh_trangThai')
                ->default('3');
            
            $table->unique('kh_taiKhoan');
            $table->unique('kh_ngaySinh');
            $table->unique('kh_dienThoai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
