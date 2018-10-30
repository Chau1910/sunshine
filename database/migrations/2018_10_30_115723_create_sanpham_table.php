<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigInteger('sp_ma')
                ->autoIncrement()
                ->comment('Ma san pham');
            $table->string('sp_ten',191)
                ->comment('Ten san pham');
            $table->unsignedTinyInteger('sp_giaGoc')
                ->default('0')
                ->comment('Gia goc mac dinh la 0');
            $table->unsignedTinyInteger('sp_giaBan')
                ->default('0')
                ->comment('Gia ban mac dinh la 0');
            $table->string('sp_hinh',200)
                ->comment('Hinh san pham');
            $table->text('sp_thongTin')
                ->comment('Thong tin san pham');
            $table->string('sp_danhGia',50)
                ->comment('Danh gia san pham');
            $table->timestamp('sp_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem bat dau tao san pham');
            $table->timestamp('sp_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat san pham gan nhat');
            $table->unsignedTinyInteger('sp_trangThai')
                ->default('2')
                ->comment('Trang thai san pham: 1-Khoa, 2-Kha dung');
            $table->unsignedTinyInteger('l_ma')
                ->comment(' Ma loai san pham');
            
            $table->unique(['sp_ten']);

            $table->foreign('l_ma')
                ->references('l_ma')
                ->on('loai');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
