<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    public $timestamp = false;

    protected $table       = 'hinhanh';
    protected $fillable    = ['ha_ten', 'sp_ma'];
    protected $guarded       = ['ha_stt'];

    protected $primaryKey  = ['sp_ma, hs_stt'];
    public $incrementing = false;

    public function hinhsanpham(){
        return $this->belongsTo('App\SanPham','sp_ma','sp_ma');
    }

}
