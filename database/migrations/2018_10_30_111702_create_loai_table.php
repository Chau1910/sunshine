<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('l_ma')
                ->autoIncrement()
                ->comment(' Ma loai san pham');
            $table->String('l_ten',50)
                ->comment('Ten loai san pham');
            $table->timestamp('l_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem bat dau tao loai san pham');
            $table->timestamp('l_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat loai san pham gan nhat');
            $table->unsignedTinyInteger('l_trangThai')
                ->default('2')
                ->comment('Trang thai loai: 1-Khoa, 2-Kha dung');

            $table->unique(['l_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai');
    }
}
