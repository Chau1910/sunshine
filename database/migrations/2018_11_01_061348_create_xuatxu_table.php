<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXuatxuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuatxu', function (Blueprint $table) {
        $table->engine = 'InnoDB';

        $table->smallInteger('xx_ma')
            ->autoIncrement()
            ->comment(' Ma xuat xu');
        $table->String('xx_ten',100)
            ->comment('Ten xuat xu');
        $table->timestamp('xx_taoMoi')
            ->default(DB::raw('CURRENT_TIMESTAMP'))
            ->comment('Thoi diem bat dau tao xuat xu');
        $table->timestamp('xx_capNhat')
            ->default(DB::raw('CURRENT_TIMESTAMP'))
            ->comment('Thoi diem cap nhat xuat xu gan nhat');
        $table->unsignedTinyInteger('xx_trangThai')
            ->default('2')
            ->comment('Trang thai loai: 1-Khoa, 2-Kha dung');

        $table->unique(['xx_ten']);    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuatxu');
    }
}
