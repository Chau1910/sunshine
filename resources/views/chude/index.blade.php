
<h2><span style = "color:red">Chu de san pham</span></h2>

<table border = "1">
    <thead>
        <tr>
            <th>Ma</th>
            <th>Ten chu de</th>
        </tr>
    </thead>
    <tbody>
    @foreach($danhsachchude as $chude)
    <tr>
    <td>{{ $chude->cd_ma }}</td>
    <td>{{ $chude->cd_ten }}</td>
    </tr>
    @endforeach
    </tbody>
</table>