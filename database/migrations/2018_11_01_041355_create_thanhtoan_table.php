<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedInteger('tt_ma')
                ->autoIncrement()
                ->comment('Ma thanh toan');
            $table->string('tt_ten',191)
                ->comment('Ten thanh toan');
            $table->text('tt_dienGiai')
                ->comment('Dien giai thanh toan');
            $table->timestamp('tt_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi thanh toan');
            $table->timestamp('tt_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat thanh toan gan nhat');
            $table->unsignedInteger('tt_trangThai')
                ->default('2')
                ->comment('Trang thai: 1:khoa, 2:kha dung');

            $table->unique(['tt_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanhtoan');
    }
}
