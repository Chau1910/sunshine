@extends('backend.layouts.index')

@section('title')
    Them moi nha cung cap
@endsection

@section('custom-css')
<!-- Cac css danh rieng cho thu vien bootstrap-fileinput-->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('main-content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2>Them moi nha cung cap</h2>

<form  method="post" action="{{ route('danhsachnhacungcap.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    
    <div class="form-group">
        <label for="ncc_ten">Ten nha cung cap</label>
            <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" placeholder="Nhap ten nha cung cap" value="{{ old('ncc_ten') }}">
    </div>  

    <div class="form-group">
        <label for="ncc_taoMoi">Ngay tao moi</label>
            <input type="text" class="form-control" id="ncc_taoMoi" name="ncc_taoMoi" placeholder="Nhap ngay tao Moi" value="{{ old('ncc_taoMoi') }}">
    </div>

    <div class="form-group">
        <label for="ncc_capNhat">Ngay cap nhat</label>
            <input type="text" class="form-control" id="ncc_capNhat" name="ncc_capNhat" placeholder="Nhap ngay cap nhat" value="{{ old('ncc_capNhat') }}">
    </div>

    <div class="form-group">
        <label for="ncc_trangThai">Trang thai</label>
            <select name="ncc_trangThai">
                <option value="1" {{ old('ncc_trangThai') == 1 ? "selected" : "" }}>Khoa</option>
                <option value="2" {{ old('ncc_trangThai') == 2 ? "selected" : "" }}>Kha dung</option>
            </select>
    </div>

    <button type="submit" class="btn btn-primary">Add</button>     
</form>                      
@endsection

@section('custom-scripts')
<!-- Các script dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/vi.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>


@endsection