<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoaiRequest;
use App\Loai;
use Session;

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

    public function edit($id){
        //Lay du lieu de edit
        $loai = Loai::where("l_ma", $id)->first();
        return view('loai.edit')->with('loai', $loai);
            
    } 

    public function update(LoaiRequest $request, $id){
        //Rang buoc du lieu
        //$validator = Validator::make($request->all(),[
           // 'l_ten' => 'required|unique:loai|max:60',
          //  'l_taoMoi' => 'required',
          //  'l_capNhat' => 'required',
          //  'l_trangThai' => 'required',
        //]);

        //if ($validator->fails()){
          //  return redirect(route('danhsachloai.edit', ['id' => $id]))
            //    ->withErrors($validator)
            //    ->withInput();
//}
        //cap nhat du lieu
        $loai = Loai::where("l_ma", $id)->first();
        $loai->l_ten        = $request->l_ten;
        $loai->l_taoMoi     = $request->l_taoMoi;
        $loai->l_capNhat    = $request->l_capNhat;
        $loai->l_trangThai  = $request->l_trangThai;
        
        $loai->save();

        //Hien thi thong bao update
        Session::flash('alert-info', 'Update Successfully!!');
        return redirect()->route('danhsachloai.index');

    } 

    public function destroy($id){
        //Xoa du lieu de edit
        $loai = Loai::where("l_ma", $id)->first();
        $loai->delete();

        //Hien thi thong bao delete
        Session::flash('alert-danger', 'Delete Successfully!!');
        return redirect()->route('danhsachloai.index');
            
    } 
}
