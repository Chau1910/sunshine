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

    public function create(){
        //Them moi du lieu
        
        return view('loai.create');
            
    } 

    public function store(Request $request){
        //Dua du lieu len CSDL
        $loai               = new Loai();
        $loai->l_ten        = $request->l_ten;
        $loai->l_taoMoi     = $request->l_taoMoi;
        $loai->l_capNhat    = $request->l_capNhat;
        $loai->l_trangThai  = $request->l_trangThai;
        
        $loai->save();

    } 
}
