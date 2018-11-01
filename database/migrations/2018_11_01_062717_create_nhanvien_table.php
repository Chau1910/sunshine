<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('nv_ma')
                ->autoIncrement()
                ->comment('Ma nhan vien');

            $table->string('nv_taiKhoan',50)
                ->comment('Tai khoan nhan vien');

            $table->string('nv_matKhau',32)
                ->comment('Mat khau nhan vien');

            $table->string('nv_hoTen',100)
                ->comment('Ho ten nhan vien');

            $table->unsignedInteger('nv_gioiTinh')
                ->default('1')
                ->comment('1:kha dung, 2:khoa');

            $table->string('nv_email',100)
                ->comment('Email nhan vien');

            $table->dateTime('nv_ngaySinh')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Ngay sinh nhan vien');

            $table->string('nv_diaChi',250)
                ->comment('Dia chi nhan vien');

            $table->string('nv_dienThoai',11)
                ->comment('Dien thoai nhan vien');

            $table->timestamp('nv_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi nhan vien');

            $table->timestamp('nv_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat nhan vien gan nhat');

            $table->unsignedTinyInteger('nv_trangThai')
                ->default('2')
                ->comment('Trang thai: 1:khoa, 2:kha dung');

            $table->unsignedInteger('q_ma')
                ->comment('Quyen nhan vien');

            $table->unique('nv_taiKhoan');
            $table->unique('nv_email');
            $table->unique('nv_dienThoai');

            $table->foreign('q_ma')
                ->references('q_ma')
                ->on('quyen');
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
