<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedInteger('q_ma')
                ->autoIncrement()
                ->comment('Ma quyen');
            $table->string('q_ten',30)
                ->comment('Ten quyen');
            $table->string('q_dienGiai',250)
                ->nullable()
                ->comment('Dien giai quyen');
            $table->timestamp('q_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi quyen');
            $table->timestamp('q_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat quyen gan nhat');
            $table->unsignedInteger('q_trangThai')
                ->default('2')
                ->comment('Trang thai: 1:khoa, 2:kha dung');

            $table->unique(['q_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quyen');
    }
}
