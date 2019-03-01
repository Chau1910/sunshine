<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\Loai;
use App\HinhAnh;
use Session;
use Storage;
//use App\Http\Controllers\Hinhanh;
use App\Exports\SanPhamExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;


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
            'sp_anhDaiDien' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
            
        ]);

        $sp = new SanPham();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_size = $request->sp_size;
        $sp->sp_soLuongBanDau = $request->sp_soLuongBanDau;
        $sp->sp_soLuongHienTai = $request->sp_soLuongHienTai;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;

        if($request->hasFile('sp_anhDaiDien')){


            //Upload hinh moi
            $file = $request->sp_anhDaiDien;
            //luu ten hinh vao column sp_hinh
            $sp->sp_anhDaiDien = $file->getClientOriginalName();

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

    public function update(Request $request, $id){
        $validation = $request->validate([
            'sp_anhDaiDien' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $sp = SanPham::where("sp_ma", $id)->first();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_size = $request->sp_size;
        $sp->sp_soLuongBanDau = $request->sp_soLuongBanDau;
        $sp->sp_soLuongHienTai = $request->sp_soLuongHienTai;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;

        if($request->hasFile('sp_anhDaiDien')){

            //Xoa hinh cu
            Storage::delete('public/photos/' . $sp->sp_anhDaiDien);
            //Upload hinh moi
            $file = $request->sp_anhDaiDien;
            //luu ten hinh vao column sp_hinh
            $sp->sp_anhDaiDien = $file->getClientOriginalName();

            //Chep file vao thu muc "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->sp_anhDaiDien);
        }


        $sp->save();

        Session::flash('alert-info', 'Cap nhat thanh cong!!!!');
        return redirect()->route('danhsachsanpham.index');
    }

    public function destroy($id){
        //Xoa du lieu de edit
        $sp = SanPham::where("sp_ma", $id)->first();
        if(empty($sp) == false)
        {
            //Delete cac dong lien quan trong table 'HinhAnh'
            foreach($sp->hinhanhlienquan()->get() as $hinhAnh){
                //Xoa hinh cu de tranh rac
                Storage::delete('public/photos/'. $hinhAnh->h_ten);

                //Xoa record
                $hinhAnh->delete();
            }
            //Xoa hinh cu de tranh rac
            Storage::delete('public/photos/' . $sp->sp_anhDaiDien);
        }
        $sp->delete();

        //Hien thi thong bao delete
        Session::flash('alert-info', 'Delete Successfully!!');
        return redirect()->route('danhsachsanpham.index');
            
    }
    
    public function excel(){
        return Excel::download(new SanPhamExport, 'danhsachsanpham.xlsx');
    }

    public function pdf() 
{
    $ds_sanpham = SanPham::all();
    $ds_loai    = Loai::all();
    $data = [
        'danhsachsanpham' => $ds_sanpham,
        'danhsachloai'    => $ds_loai,
    ];
    /* Code dành cho việc debug
    - Khi debug cần hiển thị view để xem trước khi Export PDF
    */
    // return view('sanpham.pdf')
    //     ->with('danhsachsanpham', $ds_sanpham)
    //     ->with('danhsachloai', $ds_loai);
    $pdf = PDF::loadView('sanpham.pdf', $data);
    return $pdf->download('DanhMucSanPham.pdf');
}

public function print()
{
    $ds_sanpham = SanPham::all();
    $ds_loai    = Loai::all();
    $data = [
        'danhsachsanpham' => $ds_sanpham,
        'danhsachloai'    => $ds_loai,
    ];
    return view('sanpham.print')
        ->with('danhsachsanpham', $ds_sanpham)
        ->with('danhsachloai', $ds_loai);
}
}
