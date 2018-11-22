@extends('backend.layouts.index')

@section('title')
    Danh sach san pham
@endsection

@section('main-content')

<h2>Danh sach san pham</h2>

<table border = "1">
    <thead>
        <tr>
            <th>Ma</th>
            <th>Ten </th>
            <th>Hinh anh</th>
            <th>Thuoc loai</th>
            <th>Sua</th>
            <th>Xoa</th>
          
        </tr>
    </thead>
    <tbody>
    @foreach($ds_sp as $sp)
        <tr>
            <td>{{ $sp->sp_ma }}</td>
            <td>{{ $sp->sp_ten }}</td>
            <td><img src="{{ asset('storage/photos/' .$sp->sp_hinh) }}" class="img-list" /></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection