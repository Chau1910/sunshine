<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NhacungcapRequest;
use App\Nhacungcap;
use Session;

class NhacungcapController extends Controller
{
    public function index(){
        //Eloquent Model de lay du lieu
        $ds_ncc = Nhacungcap::all();//select * from loai

        return view('nhacungcap.index')
            ->with('danhsachnhacungcap', $ds_ncc);
    } 

    public function create(){
        //Them moi du lieu
        
        return view('nhacungcap.create');

         Session::flash('alert-info', 'Them moi thanh cong!!!!');
        
    }

    public function store(Request $request){
        //Dua du lieu len CSDL
        $ncc                 = new Nhacungcap();
        $ncc->ncc_ten        = $request->ncc_ten;
        $ncc->ncc_taoMoi     = $request->ncc_taoMoi;
        $ncc->ncc_capNhat    = $request->ncc_capNhat;
        $ncc->ncc_trangThai  = $request->ncc_trangThai;
        
        $ncc->save();
        Session::flash('alert-info', 'Them moi thanh cong!!!!');
        return redirect()->route('danhsachnhacungcap.index');

    } 

    public function edit($id){
        //Lay du lieu de edit
        $ncc = Nhacungcap::where("ncc_ma", $id)->first();
        return view('nhacungcap.edit')->with('nhacungcap', $ncc);
            
    } 

    public function update(NhacungcapRequest $request, $id){
  
        //cap nhat du lieu
        $ncc = Nhacungcap::where("ncc_ma", $id)->first();
        $ncc->ncc_ten        = $request->ncc_ten;
        $ncc->ncc_taoMoi     = $request->ncc_taoMoi;
        $ncc->ncc_capNhat    = $request->ncc_capNhat;
        $ncc->ncc_trangThai  = $request->ncc_trangThai;
        
        $ncc->save();

        //Hien thi thong bao update
        Session::flash('alert-info', 'Update Successfully!!');
        return redirect()->route('danhsachnhacungcap.index');

    } 

    public function destroy($id){
        //Xoa du lieu de edit
        $ncc = Nhacungcap::where("ncc_ma", $id)->first();
        $ncc->delete();

        //Hien thi thong bao delete
        Session::flash('alert-danger', 'Delete Successfully!!');
        return redirect()->route('danhsachnhacungcap.index');
            
    } 

}
