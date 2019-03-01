<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    const CREATED_AT       = 'ncc_taoMoi';
    const UPDATED_AT       = 'ncc_capNhat';

    protected $table       = 'nhacungcap';
    protected $fillable    = ['ncc_ten', 'ncc_taoMoi', 'ncc_capNhat', 'ncc_trangThai'];
    protected $guarded       = ['ncc_ma'];

    protected $primaryKey  = 'ncc_ma';

    protected $dates       = ['ncc_taoMoi', 'ncc_capNhat'];
    protected $dateFormat  = 'Y-m-d H:i:s';

    public function danhsachsanpham(){
        return $this->hasMany('App\SanPham','ncc_ma','ncc_ma');
    }
}
