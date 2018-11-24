@extends('backend.layouts.index')

@section('title')
    Hieu chinh san pham
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

<form  method="post" action="{{ route('danhsachsanpham.update', ['id' => $sp->sp_ma]) }}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT"/>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ma">Loai san pham</label>
        <select name="l_ma">
            @foreach($danhsachloai as $loai)
                @if($loai->l_ma == $sp->l_ma)
                <option value="{{ $loai -> l_ma }}" selected>{{ $loai->l_ten }}</option>
                @else
                <option value="{{ $loai -> l_ma }}" >{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>        
    </div>

    <div class="form-group">
        <label for="sp_ten">Ten san pham</label>
            <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ $sp->sp_ten }}">
    </div>  

    <div class="form-group">
        <label for="sp_giaGoc">Gia goc</label>
            <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" value="{{ $sp->sp_giaGoc }}">
    </div>

    <div class="form-group">
        <label for="sp_giaBan">Gia ban</label>
            <input type="text" class="form-control" id="sp_giaBan" name="sp_giaBan" value="{{ $sp->sp_giaBan }}">
    </div>

    <div class="form-group">
        <div class="file-loading">
            <label for="sp_hinh">Hinh dai dien</label>
                <input type="file" name="sp_hinh" id="sp_hinh" value="{{ $sp->sp_hinh }}">
        </div>
    </div>

    <div class="form-group">
        <label for="sp_thongTin">Thong tin</label>
            <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" value="{{ $sp->sp_thongTin }}">
    </div>

    <div class="form-group">
        <label for="sp_danhGia">Danh gia</label>
            <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" value="{{ $sp->sp_danhGia }}">
    </div>

    <div class="form-group">
        <label for="sp_taoMoi">Ngay tao moi</label>
            <input type="text" class="form-control" id="sp_taoMoi" name="sp_taoMoi" value="{{ $sp->sp_taoMoi }}">
    </div>

    <div class="form-group">
        <label for="sp_capNhat">Ngay cap nhat</label>
            <input type="text" class="form-control" id="sp_capNhat" name="sp_capNhat" value="{{ $sp->sp_capNhat }}">
    </div>

    <div class="form-group">
        <label for="sp_trangThai">Trang thai</label>
            <select name="sp_trangThai">
                <option value="1" {{ $sp->sp_trangThai == 1 ? "selected" : ""}} >Khoa</option>
                <option value="2" {{ $sp->sp_trangThai == 2 ? "selected" : ""}}>Kha dung</option>
            </select>
    </div>

    <button type="submit" class="btn btn-primary">Luu</button>     
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
            initialPreviewAsData: true,
            initialPreview:[
                "{{ asset('storage/photos/' . $sp->sp_hinh) }}"
            ],
            initialPreviewConfig: [
                {caption: "{{ $sp->sp_hinh }}", size: {{ Storage::size('public/photos/' . 
                $sp->sp_hinh )}}, width: "120px", url: "{$url}", key: 1},
            ]
        });
    });
</script>
@endsection