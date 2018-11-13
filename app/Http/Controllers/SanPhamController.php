<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;

class SanPhamController extends Controller
{
    public function index(){
        //Eloquent Model de lay du lieu
        $ds_sp = SanPham::all();//select * from loai

        return view('sanpham.index')
            ->with('ds_sp', $ds_sp);
    } 
}
