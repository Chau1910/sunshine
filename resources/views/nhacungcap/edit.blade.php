@extends('backend.layouts.index')

@section('title')
    Hieu chinh nha cung cap
@endsection

@section('main-content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('danhsachnhacungcap.update', ['id' => $ncc->ncc_ma]) }}">
    <input type="hidden" name="_method" value="PUT"/>

    {{ csrf_field() }}

<div class="form-group">
    <label for="ncc_ten">Nhap ten loai</label>
        <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" value="{{ $ncc->ncc_ten }}" placeholder="Nhap ten nha cung cap">
</div>  
<div class="form-group">
    <label for="ncc_taoMoi">Nhap ngay tao moi</label>
        <input type="text" class="form-control" id="ncc_taoMoi" name="ncc_taoMoi" value="{{ $ncc->ncc_taoMoi }}" placeholder="Nhap ngay tao moi">
</div>
<div class="form-group">
    <label for="ncc_capNhat">Nhap ngay cap nhat</label>
        <input type="text" class="form-control" id="ncc_capNhat" name="ncc_capNhat" value="{{ $ncc->ncc_capNhat }}" placeholder="Nhap ngay cap nhat">
</div>
<div class="form-group">
    <label for="ncc_trangThai">Trang thai</label>
    <select name="ncc_trangThai">
        <option value="1" {{ $ncc->ncc_trangThai == 1 ? "selected" : "" }}>Khoa</option>
        <option value="2" {{ $ncc->ncc_trangThai == 2 ? "selected" : "" }}>Kha dung</option>
    </select>
        
</div>
<button type="submit" class="btn btn-primary">Submit</button>     
</form>                      
@endsection