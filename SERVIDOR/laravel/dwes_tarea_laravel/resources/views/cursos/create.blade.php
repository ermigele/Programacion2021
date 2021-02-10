@extends("../layouts.plantilla")

@section("cabecera")
	Insertar un nuevo Curso
@endsection

@section("cuerpo")
	<form method="post" action="/cursos">
		@csrf
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr>
				<td>Número de horas</td>
				<td><input type="number" name="horas"></td>
			</tr>
			<tr>
				<td>Número de plazas</td>
				<td><input type="number" name="plazas"></td>
			</tr>
			<tr>
				<td>Categoria</td>
				<td><select name="categoria_id">
						<option value="">Seleccione Categoria</option>
						@foreach ($categorias as $c)
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