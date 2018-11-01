<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanchuyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('vc_ma')
                ->autoIncrement()
                ->comment(' Ma van chuyen');
            $table->String('vc_ten',191)
                ->comment('Ten van chuyen');
            $table->integer('vc_chiPhi')
                ->default('0')
                ->comment('Chi phi van chuyen');
            $table->text('vc_dienGiai')
                ->comment('Dien giai van chuyen');
            $table->timestamp('vc_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem bat dau tao van chuyen moi');
            $table->timestamp('vc_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat van chuyen gan nhat');
            $table->unsignedTinyInteger('vs_trangThai')
                ->default('2')
                ->comment('Trang thai: 1:khoa, 2:kha dung');
            
            $table->unique(['vc_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vanchuyen');
    }
}
