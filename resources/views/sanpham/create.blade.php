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

<h2>Them moi san pham</h2>

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
            <input type="text" class="form-control" id="sp_ten" name="sp_ten" placeholder="Nhap ten san pham">
    </div>  

    <div class="form-group">
        <label for="sp_giaGoc">Gia goc</label>
            <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" placeholder="Nhap gia goc">
    </div>

    <div class="form-group">
        <label for="sp_giaBan">Gia ban</label>
            <input type="text" class="form-control" id="sp_giaBan" name="sp_giaBan" placeholder="Nhap gia ban">
    </div>

    <div class="form-group">
        <div class="file-loading">
            <label for="sp_hinh">Hinh dai dien</label>
                <input type="file" name="sp_hinh" id="sp_hinh">
        </div>
    </div>

    <div class="form-group">
        <label for="sp_thongTin">Thong tin</label>
            <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" placeholder="Thong tin san pham">
    </div>

    <div class="form-group">
        <label for="sp_danhGia">Danh gia</label>
            <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" placeholder="Danh gia san pham">
    </div>

    <div class="form-group">
        <label for="sp_taoMoi">Ngay tao moi</label>
            <input type="text" class="form-control" id="sp_taoMoi" name="sp_taoMoi" placeholder="Nhap ngay tao Moi">
    </div>

    <div class="form-group">
        <label for="sp_capNhat">Ngay cap nhat</label>
            <input type="text" class="form-control" id="sp_capNhat" name="sp_capNhat" placeholder="Nhap ngay cap nhat">
    </div>

    <div class="form-group">
        <label for="sp_trangThai">Trang thai</label>
            <select name="sp_trangThai">
                <option value="1">Khoa</option>
                <option value="2">Kha dung</option>
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

<script>
    $(document).ready(function() {
        $("#sp_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"]
        });
    });
</script>
@endsection