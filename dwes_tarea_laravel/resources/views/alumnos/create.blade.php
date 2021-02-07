@extends("../layouts.plantilla")

@section("cabecera")
	Insertar un nuevo Alumno
@endsection

@section("cuerpo")
	<form method="post" action="/alumnos">
		@csrf
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr>
				<td>Apellidos</td>
				<td><input type="text" name="apellidos"></td>
			</tr>
			<tr>
				<td>Edad</td>
				<td><input type="number" name="edad"></td>
			</tr>
			<tr>
				<td>Curso</td>
				<td><select name="curso_id">
						<option value="">Seleccione Curso</option>
						@foreach ($cursos as $c)
							<option value="{{ $c->id }}">{{ $c->nombre }}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="enviar" value="Guardar"></td>
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