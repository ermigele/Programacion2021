@extends ("../layout.plantilla")

@section ("cabecera")
<h1>Listado de centros</h1>
@endsection

@section ("cuerpo")
<table border="1.5">
    <thead>
        <th>Nombre</th>
        <th>Direccion</th>
    </thead>
    @foreach($centros as $centro)
    <tr>
        <td><a href="{{ROUTE('centro.edit', $centro->id}}">{{$centro->nombre}}</a></td>
        <td>{{$centro->direccion}}</td>
    </tr>
    @endforeach
</table>
@endsection

@section("pie")
@endsection