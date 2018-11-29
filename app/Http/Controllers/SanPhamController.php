<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\Loai;
use Session;
use Storage;
use App\Http\Controllers\Hinhanh;

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

        //Luu hinh anh lien quan
        if($request->hasFile('sp_hinhanhlienquan')){
            $files = $request->sp_hinhanhlienquan;

            //Duyet tung anh va thuc hien luu
            foreach($request->sp_hinhanhlienquan as $index=>$file){
                $file->storeAs('public/photos', $file->getClientOriginalName());

                //Tao doi tuong Hinhanh
                $hinhAnh = new Hinhanh();
                $hinhAnh->sp_ma = $sp->sp_ma;
                $hinhAnh->ha_stt = ($index + 1);
                $hinhAnh->ha_ten = $file->getClientOriginalName();
                $hinhAnh->save();
            }
        }

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
        $validation = $request->validate([
            'sp_hinh' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            // Cú pháp dùng upload nhiều file
            'sp_hinhanhlienquan.*' => 'image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

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

        //Luu hinh anh lien quan
        if($request->hasFile('sp_hinhanhlienquan')) {
            // DELETE các dòng liên quan trong table `HinhAnh`
            foreach($sp->hinhanhlienquan()->get() as $hinhAnh)
            {
                // Xóa hình cũ để tránh rác
                Storage::delete('public/photos/' . $hinhAnh->ha_ten);
                // Xóa record
                $hinhAnh->delete();
            }
            $files = $request->sp_hinhanhlienquan;

            //Duyet tung anh va thuc hien luu
            foreach ($request->sp_hinhanhlienquan as $index => $file) {
            
                $file->storeAs('public/photos', $file->getClientOriginalName());
                // Tạo đối tưọng HinhAnh
                $hinhAnh = new HinhAnh();
                $hinhAnh->sp_ma = $sp->sp_ma;
                $hinhAnh->ha_stt = ($index + 1);
                $hinhAnh->ha_ten = $file->getClientOriginalName();
                $hinhAnh->save();
            }
        }

        $sp->save();

        Session::flash('alert-info', 'Cap nhat thanh cong!!!!');
        return redirect()->route('danhsachsanpham.index');
    }

    public function destroy($id){
        //Xoa du lieu de edit
        $sp = Sanpham::where("sp_ma", $id)->first();
        if(empty($sp) == false)
        {
            //Delete cac dong lien quan trong table 'HinhAnh'
            foreach($sp->hinhanhlienquan()->get() as $hinhAnh){
                //Xoa hinh cu de tranh rac
                Storage::delete('public/photos/'. $hinhAnh->ha_ten);

                //Xoa record
                $hinhAnh->delete();
            }
            //Xoa hinh cu de tranh rac
            Storage::delete('public/photos/' . $sp->sp_hinh);
        }
        $sp->delete();

        //Hien thi thong bao delete
        Session::flash('alert-info', 'Delete Successfully!!');
        return redirect()->route('danhsachsanpham.index');
            
    } 
}
