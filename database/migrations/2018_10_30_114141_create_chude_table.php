<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chude', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('cd_ma')
                ->autoIncrement()
                ->comment('Ma chu de');
            $table->String('cd_ten',50)
                ->comment('Ten chu de');
            $table->timestamp('cd_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem bat dau tao chu de san pham');
            $table->timestamp('cd_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat chu de gan nhat');
            $table->unsignedTinyInteger('cd_trangThai')
                ->default('2')
                ->comment('Trang thai chu de: 1-Khoa, 2-Kha dung');
            
            $table->unique(['cd_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chude');
    }
}
