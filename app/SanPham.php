<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    const CREATED_AT       = 'sp_taoMoi';
    const UPDATED_AT       = 'sp_capNhat';

    protected $table       = 'sanpham';
    protected $fillable    = ['sp_ten', 'sp_giaGoc', 'sp_giaBan', 'sp_size', 'sp_soLuongBanDau','sp_soLuongHienTai', 'sp_anhDaiDien', 'sp_taoMoi', 'sp_capNhat', 'sp_trangThai', 'l_ma'];
    protected $guarded       = ['sp_ma'];

    protected $primaryKey  = 'sp_ma';

    protected $dates       = ['sp_taoMoi', 'sp_capNhat'];
    protected $dateFormat  = 'Y-m-d H:i:s';

    public function danhsachloai(){
        return $this->belongsTo('App\Loai','l_ma','l_ma');
    }

    public function danhsachhinhanh(){
        return $this->hasMany('App\HinhAnh','sp_ma','sp_ma');
    }
}
