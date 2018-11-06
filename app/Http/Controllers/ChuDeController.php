<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuDe;

class ChuDeController extends Controller
{
    public function index(){
        //Eloquent Model de lay du lieu
        $ds_cd = ChuDe::all();//select * from loai

        return view('chude.index')
            ->with('danhsachchude', $ds_cd);
    }
}
