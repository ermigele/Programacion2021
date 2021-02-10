@extends("../layouts.plantilla")

@section("cabecera")
	Actualizar un Alumno
@endsection

@section("cuerpo")
	<form method="post" action="/alumnos/{{ $alumno->id }}">
		@method("PUT")
		@csrf
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" value="{{ $alumno->nombre }}"></td>
			</tr>
			<tr>
				<td>Apellidos</td>
				<td><input type="text" name="apellidos" value="{{ $alumno->apellidos }}"></td>
			</tr>
			<tr>
				<td>Edad</td>
				<td><input type="number" name="edad" value="{{ $alumno->edad }}"></td>
			</tr>
			<tr>
				<td>Curso</td>
				<td><input type="text" name="curso" value="{{ $alumno->curso()->first()->nombre }}"  readonly></td>
				<input type="hidden" name="curso_id" value="{{ $alumno->curso()->first()->id }}"/> 
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="enviar" value="Actualizar"></td>
			</tr>
		</table>
	</form>

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