<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\Loai;
use Session;
use Storage;

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

        $validation = $request->validate([
            'sp_hinh' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
            //Cu phap dung upload nhieu file
            
        ]);

        $sp = new SanPham();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;

        if($request->hasFile('sp_hinh')){


            //Upload hinh moi
            $file = $request->sp_hinh;
            //luu ten hinh vao column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();

            //Chep file vao thu muc "photos"
            $file->storeAs('public/photos', $file->getClientOriginalName());
        }

        $sp->save();

        Session::flash('alert-info', 'Them moi thanh cong!!!!');
        return redirect()->route('danhsachsanpham.index');
    }

    public function edit($id){
        $sp = SanPham::where("sp_ma", $id)->first();
        $ds_loai = Loai::all();

        return view('sanpham.edit')
            ->with('sp', $sp)
            ->with('danhsachloai', $ds_loai);
    }

    public function update(LoaiRequest $request, $id){

        $sp = SanPham::where("sp_ma", $id)->first();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;

        if($request->hasFile('sp_hinh')){

            //Xoa hinh cu
            Storage::delete('public/photos/' . $sp->sp_hinh);
            //Upload hinh moi
            $file = $request->sp_hinh;
            //luu ten hinh vao column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();

            //Chep file vao thu muc "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->sp_hinh);
        }

        $sp->save();

        Session::flash('alert-info', 'Them moi thanh cong!!!!');
        return redirect()->route('danhsachsanpham.index');
    }

    public function destroy($id){
        //Xoa du lieu de edit
        $sp = Sanpham::where("sp_ma", $id)->first();
        if(empty($sp) == false)
        {
            //Xoa hinh cu de tranh rac
            Storage::delete('public/photos/' . $sp->sp_hinh);
        }
        $sp->delete();

        //Hien thi thong bao delete
        Session::flash('alert-info', 'Delete Successfully!!');
        return redirect()->route('danhsachsanpham.index');
            
    } 
}
