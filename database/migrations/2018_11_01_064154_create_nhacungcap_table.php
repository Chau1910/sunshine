<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhacungcap', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->smallInteger('ncc_ma')
                ->autoIncrement()
                ->comment('Ma nha cung cap');

            $table->string('ncc_ten',191)
                ->comment('Ho ten nha cung cap');

            $table->string('ncc_daiDien',100)
                ->comment('Dai dien nha cung cap');

            $table->string('ncc_diaChi',250)
                ->comment('Dia chi nha cung cap');

            $table->string('ncc_dienThoai',11)
                ->comment('Dien thoai nha cung cap');

            $table->string('ncc_email',100)
                ->comment('Email nha cung cap');

            $table->timestamp('ncc_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi nha cung cap');

            $table->timestamp('ncc_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat nha cung cap gan nhat');

            $table->unsignedTinyInteger('ncc_trangThai')
                ->default('2')
                ->comment('Trang thai: 1:khoa, 2:kha dung');

            $table->smallInteger('xx_ma')
                ->comment('ma xuat xu');

            $table->unique('ncc_ten');

            $table->foreign('xx_ma')
                ->references('xx_ma')
                ->on('xuatxu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhacungcap');
    }
}
