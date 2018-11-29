@extends('backend.layouts.index')

@section('title')
    Them moi san pham
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

<h2>Them moi san pham</h2>

<form  method="post" action="{{ route('danhsachsanpham.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ma">Loai san pham</label>
        <select name="l_ma">
            @foreach($danhsachloai as $loai)
                @if(old('l_ma') == $loai->l_ma)
                <option value="{{ $loai -> l_ma }}">{{ $loai->l_ten }}</option>
                @else
                <option value="{{ $loai -> l_ma }}">{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>        
    </div>

    <div class="form-group">
        <label for="sp_ten">Ten san pham</label>
            <input type="text" class="form-control" id="sp_ten" name="sp_ten" placeholder="Nhap ten san pham" value="{{ old('sp_ten') }}">
    </div>  

    <div class="form-group">
        <label for="sp_giaGoc">Gia goc</label>
            <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" placeholder="Nhap gia goc" value="{{ old('sp_giaGoc') }}">
    </div>

    <div class="form-group">
        <label for="sp_giaBan">Gia ban</label>
            <input type="text" class="form-control" id="sp_giaBan" name="sp_giaBan" placeholder="Nhap gia ban" value="{{ old('sp_giaBan') }}">
    </div>

    <div class="form-group">
        <div class="file-loading">
            <label for="sp_hinh">Hinh dai dien</label>
                <input type="file" name="sp_hinh" id="sp_hinh">
        </div>
    </div>


    <div class="form-group">
        <label for="sp_thongTin">Thong tin</label>
            <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" placeholder="Thong tin san pham" value="{{ old('sp_thongTin') }}">
    </div>

    <div class="form-group">
        <label for="sp_danhGia">Danh gia</label>
            <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" placeholder="Danh gia san pham" value="{{ old('sp_danhGia') }}">
    </div>

    <div class="form-group">
        <label for="sp_taoMoi">Ngay tao moi</label>
            <input type="text" class="form-control" id="sp_taoMoi" name="sp_taoMoi" placeholder="Nhap ngay tao Moi" value="{{ old('sp_taoMoi') }}">
    </div>

    <div class="form-group">
        <label for="sp_capNhat">Ngay cap nhat</label>
            <input type="text" class="form-control" id="sp_capNhat" name="sp_capNhat" placeholder="Nhap ngay cap nhat" value="{{ old('sp_capNhat') }}">
    </div>

    <div class="form-group">
        <label for="sp_trangThai">Trang thai</label>
            <select name="sp_trangThai">
                <option value="1" {{ old('sp_trangThai') == 1 ? "selected" : "" }}>Khoa</option>
                <option value="2" {{ old('sp_trangThai') == 2 ? "selected" : "" }}>Kha dung</option>
            </select>
    </div>

    <div class="form-group">
        <div class="file-loading">
            <label for="sp_hinh">Hinh lien quan san pham</label>
                <input type="file" name="sp_hinhanhlienquan[]" id="sp_hinhanhlienquan" multiple>
        </div>
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

<script>
    $(document).ready(function() {
        $("#sp_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
            
        });

        $("#sp_hinhanhlienquan").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            filetype: "any",
            previewFileIcon: false,

            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"]
        });
    });
</script>
@endsection