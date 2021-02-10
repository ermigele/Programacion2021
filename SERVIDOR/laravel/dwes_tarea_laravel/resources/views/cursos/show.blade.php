@extends("../layouts.plantilla")

@section("cabecera")
	Información del Curso
@endsection

@section("cuerpo")
<table border ="1">
	<tr>
		<th>Nombre</th>
		<th>Número de horas</th>
		<th>Número de plazas disponibles</th>
		<th>Alumnos inscritos</th>
	</tr>
	<tr>
		<td align="center">{{ $curso->nombre }}</td>
		<td align="center">{{ $curso->horas }}</td>
		<td align="center">{{ $curso->plazas - count($alumnos)}} </td>
		<td colspan="4">
		@foreach ($alumnos as $a)
		<ul>
			<li><a href="{{ route('alumnos.show', $a->id)}}">{{ $a->nombre }} {{$a->apellidos}} </a></li>
		</ul>
		@endforeach
		</td>
	</tr>
</table>

@endsection 

@section("pie")
@endsection 