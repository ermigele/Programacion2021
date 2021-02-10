@extends("../layouts.plantilla")

@section("cabecera")
	Listado de Categorias
@endsection

@section("cuerpo")
<table border ="1">
	<tr>
		<th>Categorias</th>
		<th>Acciones</th>
	</tr>


	@foreach ($categorias as $c)
	<tr>
		<td>{{ $c->nombre }}</td>
		<td align="center">
			<a href="{{ route('categorias.edit', $c->id) }}">Editar</a> - 
			<a href="{{ route('categorias.show', $c->id) }}">Mostrar</a> -
			<a href="{{ action('CategoriasController@borrar', $c->id) }}" role="button" >Borrar</a>
		</td>
	</tr>
	@endforeach
	<tr>
		<td colspan="2" align="center"><a href="{{ route('categorias.create')}}">Nuevo Categoria</a></td>
	</tr>
</table>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection 

@section("pie")
@endsection 