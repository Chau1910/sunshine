<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau', function (Blueprint $table) {
        $table->engine = 'InnoDB';

        $table->unsignedTinyInteger('m_ma')
            ->autoIncrement()
            ->comment(' Ma mau');
        $table->String('m_ten',50)
            ->comment('Ten mau');
        $table->timestamp('m_taoMoi')
            ->default(DB::raw('CURRENT_TIMESTAMP'))
            ->comment('Thoi diem bat dau tao mau');
        $table->timestamp('m_capNhat')
            ->default(DB::raw('CURRENT_TIMESTAMP'))
            ->comment('Thoi diem cap nhat mau gan nhat');
        $table->unsignedTinyInteger('m_trangThai')
            ->default('2')
            ->comment('Trang thai loai: 1-Khoa, 2-Kha dung');

        $table->unique(['m_ten']);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mau');
    }
}
