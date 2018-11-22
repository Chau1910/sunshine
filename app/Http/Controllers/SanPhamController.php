<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use Session;

class SanPhamController extends Controller
{
    public function index(){
        //Eloquent Model de lay du lieu
        $ds_sp = SanPham::all();//select * from loai

        return view('sanpham.index')
            ->with('ds_sp', $ds_sp);
    } 
    public function create(){
        $ds_loai = Loai::all();

        return view('sanpham.create')
            ->with('danhsachloai', $ds_loai);
    }
    public function store(Request $request){
        $sp = new SanPham();
        $sp->sp_ten = $request->sp_ten;

        if($request->hasFile('sp_hinh')){
            $file = $request->sp_hinh;
            //luu ten hinh vao column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();

            //Chep file vao thu muc "photos"
            $file->storeAs('photos', $file->getClientOriginalName());
        }

        $sp->save();

        Session::flash('alert-info', 'Them moi thanh cong!!!!');
        return redirect()->route('danhsachsanpham.index');
    }
}
