@extends('backend.layouts.index')

@section('title')
    Them moi san pham
@endsection

@section('main-content')

<h2>Them moi loai san pham</h2>

<form  method="post" action="{{ route('danhsachsanpham.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ma">Loai san pham</label>
        <select name="l_ma">
            @foreach($danhsachloai as $loai)
                <option value="{{ $loai -> l_ma }}">{{ $loai->l_ten }}</option>
            @endforeach
        </select>        
    </div>

    <div class="form-group">
        <label for="sp_ten">Ten san pham</label>
            <input type="text" class="form-control" id="sp_ten" name="sp_ten" placeholder="">
    </div>  

    <div class="form-group">
        <label for="sp_giaGoc">Gia goc</label>
            <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" placeholder="Nhap gia goc">
    </div>

    <div class="form-group">
        <label for="sp_hinh">Hinh dai dien</label>
            <input type="file" name="sp_hinh">
    </div>

    <button type="submit" class="btn btn-primary">Add</button>     
</form>                      
@endsection