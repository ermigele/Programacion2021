@extends("../layouts.plantilla")

@section("cabecera")
	Listado de Cursos
@endsection

@section("cuerpo")
<table border ="1">
	<tr>
		<th>Cursos</th>
		<th>Alumnos</th>
		<th>Plazas Disponibles</th>
		<th>Acciones</th>
	</tr>

	@foreach ($cursos as $c)
	<tr>
		<td>{{ $c->nombre }}</td>
			<td align="center">{{ $c->alumnos()->count() }}</td>
		@if (($c->plazas - $c->alumnos()->count()) > 0)
			<td align="center">SI</td>
		@else
			<td align="center">NO</td>
		@endif
		<td align="center">
			<a href="{{ route('cursos.edit', $c->id)}}">Editar</a> - 
			<a href="{{ route('cursos.show', $c->id)}}">Mostrar</a> -
			<a href="{{ action('CursosController@borrar', $c->id) }}" role="button" >Borrar</a>
		</td>
	
	</tr>
	@endforeach
	<tr>
		<td colspan="4" align="center"><a href="{{ route('cursos.create')}}">Nuevo Curso</a></td>
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