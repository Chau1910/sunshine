<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;

class BackendController extends Controller
{
    public function index(){
        //Eloquent Model de lay du lieu
       //select * from loai

        return view('dashboard.index');
           
    }
}
