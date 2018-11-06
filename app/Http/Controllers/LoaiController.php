<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loai;

class LoaiController extends Controller
{
    public function index(){
        //Eloquent Model de lay du lieu
        $ds_loai = Loai::all();//select * from loai

        return view('loai.index')
            ->with('danhsachloai', $ds_loai);
    } 
}
