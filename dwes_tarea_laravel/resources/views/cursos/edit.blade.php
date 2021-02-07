@extends("../layouts.plantilla")

@section("cabecera")
	Actualizar un Curso
@endsection

@section("cuerpo")
	<form method="post" action="/cursos/{{ $curso->id }}">
		@method("PUT")
		@csrf
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" value = "{{ $curso->nombre }}"></td>
			</tr>
			<tr>
				<td>Número de horas</td>
				<td><input type="number" name="horas" min=1 value = "{{ $curso->horas }}"></td>
			</tr>
			<tr>
				<td>Número de plazas</td>
				<td><input type="number" name="plazas" min=1 value = "{{ $curso->plazas }}"></td>
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