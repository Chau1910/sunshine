<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('dh_ma');
            $table->dateTime('dh_thoiGianDat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm đặt hàng # Thời điểm đặt hàng');
            $table->dateTime('dh_thoiGianGiaoHang')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm giao hàng # Thời điểm giao hàng');
            $table->string('dh_tenKhachHang', 100);
            $table->string('dh_email', 100);
            $table->string('dh_diaChi', 250)->comment('Địa chỉ người nhận # Địa chỉ người nhận');
            $table->string('dh_dienThoai', 15)->comment('Điện thoại người nhận # Điện thoại người nhận');
            $table->bigInteger('dh_tongCong');
            $table->timestamp('dh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo đơn hàng');
            $table->timestamp('dh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật đơn hàng gần nhất');
            $table->unsignedTinyInteger('dh_trangThai')->default('1')->comment('Trạng thái # Trạng thái đơn hàng: 1-nhận đơn, 2-xử lý đơn, 3-giao hàng, 4-hoàn tất, 5-đổi trả, 6-hủy');
            $table->unsignedInteger('vc_ma')->comment('Dịch vụ giao hàng # vc_ma # vc_ten # Mã dịch vụ giao hàng');
            $table->unsignedInteger('tt_ma')->comment('Phương thức thanh toán # tt_ma # tt_ten # Mã phương thức thanh toán');
            $table->unsignedInteger('kh_ma')->default('0');
            $table->foreign('tt_ma')->references('tt_ma')->on('thanhtoan');
            $table->foreign('vc_ma')->references('vc_ma')->on('vanchuyen');
            $table->foreign('kh_ma')->references('kh_ma')->on('khachhang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
