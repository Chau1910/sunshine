@extends('backend.layouts.index')

@section('title')
    Danh sach san pham
@endsection

@section('main-content')

<h2>Danh sach san pham</h2>
<a href="{{route('danhsachsanpham.create')}}" class="btn btn-primary">Them moi</a>

<a href="{{route('danhsachsanpham.excel')}}" class="btn btn-primary">Xuat Excel</a>

<a href="{{route('danhsachsanpham.pdf')}}" class="btn btn-primary">Xuat PDF</a>

<a href="{{route('danhsachsanpham.print')}}" class="btn btn-primary">In ấn</a>

<table border = "1">
    <thead>
        <tr>
            <th>Ma</th>
            <th>Ten </th>
            <th>Hinh anh</th>
            <th>Thuoc loai</th>
            <th>Edit</th>
            <th></th>
          
        </tr>
    </thead>
    <tbody>
    @foreach($ds_sp as $sp)
        <tr>
            <td>{{ $sp->sp_ma }}</td>
            <td>{{ $sp->sp_ten }}</td>
            <td><img src="{{ asset('storage/photos/' .$sp->sp_hinh) }}" class="img-list" width = "400" height="400"/></td>
            <td>{{ $sp->danhsachloai->l_ten }}</td>
            <td>
                <a href="{{ route('danhsachsanpham.edit', ['id' => $sp->sp_ma]) }}"
                class ="btn btn-primary pull-left">Sua</a>
                <form method = "post" action="{{ route('danhsachsanpham.destroy', ['id' => $sp->sp_ma]) }}" class="pull-left">
                <input type="hidden" name="_method" value="DELETE"/>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Xoa</button>
                </form>
            </td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection