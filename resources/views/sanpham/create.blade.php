@extends('backend.layouts.index')

@section('title')
    Them moi san pham
@endsection

@section('main-content')

<h2>Them moi loai san pham</h2>

<form  method="post" action="{{ route('danhsachloai.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="form-group">
    <label for="l_ma">Loai san pham</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" placeholder="Nhap ten loai">
</div>  
<div class="form-group">
    <label for="l_taoMoi">Nhap ngay tao moi</label>
        <input type="text" class="form-control" id="l_taoMoi" name="l_taoMoi" placeholder="Nhap ngay tao moi">
</div>
<div class="form-group">
    <label for="l_capNhat">Nhap ngay cap nhat</label>
        <input type="text" class="form-control" id="l_capNhat" name="l_capNhat" placeholder="Nhap ngay cap nhat">
</div>
<div class="form-group">
    <label for="l_ma">Loai san pham</label>
    <select name="l_ma">
        @foreach($danhsachloai as $loai)
        <option value="{{ $loai -> l_ma }}">Khoa</option>
        @endforeach
    </select>
        
</div>
<button type="submit" class="btn btn-primary">Add</button>     
</form>                      
@endsection