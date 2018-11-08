@extends('backend.layouts.index')

@section('title')
    Danh sach loai san pham
@endsection

@section('main-content')

<h2>Danh sach loai san pham</h2>

<table border = "1">
    <thead>
        <tr>
            <th>Ma</th>
            <th>Ten loai</th>
        </tr>
    </thead>
    <tbody>
    @foreach($danhsachloai as $loai)
    <tr>
    <td>{{ $loai->l_ma }}</td>
    <td>{{ $loai->l_ten }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection