<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->increments('km_ma');
            $table->string('km_ten', 200)->comment('Tên chương trình # Tên chương trình khuyến mãi');
            $table->text('km_noiDung')->comment('Thông tin chi tiết # Nội dung chi tiết chương trình khuyến mãi');
            $table->unsignedInteger('km_nguoiLap')->comment('Lập kế hoạch # nv_ma # nv_hoTen # Mã nhân viên (người lập chương trình khuyến mãi)');
            $table->dateTime('km_ngayLap')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm lập # Thời điểm lập kế hoạch khuyến mãi');
            $table->timestamp('km_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo chương trình khuyến mãi');
            $table->timestamp('km_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật chương trình khuyến mãi gần nhất');
            $table->timestamp('km_ngayApDung')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('km_ngayHet')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('km_trangThai')->default('2');
            $table->unsignedTinyInteger('ctkm_ma')->default('1');
            $table->unsignedTinyInteger('km_dieuKien1')->default('0');
            $table->unsignedTinyInteger('km_dieuKien2')->default('0');
            $table->float('km_triGia',8,2)->default('0');
            $table->integer('km_soTienGiam')->default('0');
            $table->string('km_maVoucher', 50)->comment('Mã voucher');
            $table->unsignedTinyInteger('km_apDungTatCa')->default('0');
            $table->foreign('km_nguoiLap')->references('nv_ma')->on('nhanvien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyenmai');
    }
}
