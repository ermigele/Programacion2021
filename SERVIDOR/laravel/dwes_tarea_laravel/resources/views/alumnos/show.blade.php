@extends("../layouts.plantilla")

@section("cabecera")
	Información del Alumno
@endsection

@section("cuerpo")
<table border ="1">
	<tr>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Edad</th>
		<th>Cursos</th>
	</tr>
	<tr>
		<td>{{ $alumno->nombre }}</td>
		<td>{{ $alumno->apellidos }}</td>
		<td align="center">{{ $alumno->edad }}</td>
		<td align="center">{{ $alumno->curso()->first()->nombre }}</td>
	</tr>
</table>

@endsection 

@section("pie")
@endsection 