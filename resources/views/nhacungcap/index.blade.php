@extends('backend.layouts.index')

@section('title')
    Danh sach nha cung cap
@endsection

@section('main-content')

<h2>{{Session::get('aaaa')}} Danh sach nha cung cap</h2>
<a href="{{ route('danhsachnhacungcap.create') }}" class="btn btn-primary">Them moi</a> 
<br></br>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{$msg}}">{{Session::get('alert-' . $msg)}}<a href="#" class="close"
        data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div>

<table border = "1">
    <thead>
        <tr>
            <th>Ma</th>
            <th>Ten nha cung cap</th>
            <th>Sua</th>
            <th>Xoa</th>
        </tr>
    </thead>
    <tbody>
    @foreach($danhsachnhacungcap as $ncc)
    <tr>
    <td>{{ $ncc->ncc_ma }}</td>
    <td>{{ $ncc->ncc_ten }}</td>
    <td><a href="{{ route('danhsachnhacungcap.edit', ['id' => $ncc->ncc_ma]) }}"> <button type="submit" class = "btn btn-danger">Edit</button></a></td>
    <td>
        <form method="post" action="{{ route('danhsachnhacungcap.destroy', ['id' => $ncc->ncc_ma]) }}">
            <input type="hidden" name="_method" value="DELETE"/>
            {{ csrf_field() }}
            <button type="submit" class = "btn btn-danger">Xoa</button>
        </form>
    </td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection