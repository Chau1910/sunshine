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
            $table->increments('sp_ma');
            $table->string('sp_ten', 200)->comment('Tên sản phẩm # Tên sản phẩm');
            $table->unsignedInteger('sp_giaGoc')->default('0')->comment('Giá gốc # Giá gốc của sản phẩm');
            $table->unsignedInteger('sp_giaBan')->default('0')->comment('Giá bán # Giá bán hiện tại của sản phẩm');
            $table->string('sp_anhDaiDien', 200)->comment('Hình đại diện # Hình đại diện của sản phẩm');
            $table->tinyInteger('sp_size')->comment('Size # Size sản phẩm');
            $table->integer("sp_soLuongBanDau");
            $table->integer("sp_soLuongConLai");
            $table->text('sp_moTa')->comment('Thông tin chi tiết # Thông tin về sản phẩm');
            $table->timestamp('sp_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo sản phẩm');
            $table->timestamp('sp_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật sản phẩm gần nhất');
            $table->tinyInteger('sp_trangThai')->default('2')->comment('Trạng thái # Trạng thái sản phẩm: 1-khóa, 2-khả dụng');
            $table->unsignedInteger('l_ma')->comment('Loại sản phẩm # l_ma # l_ten # Mã loại sản phẩm');
            $table->unsignedInteger('ncc_ma')->comment('Loại sản phẩm # l_ma # l_ten # Mã hãng sản phẩm');
            $table->foreign('ncc_ma')->references('ncc_ma')->on('nhacungcap');
            $table->foreign('l_ma')->references('l_ma')->on('loai');
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
