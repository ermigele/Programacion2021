@extends("../layouts.plantilla")

@section("cabecera")
	Actualizar un Categoria
@endsection

@section("cuerpo")
	<form method="post" action="/categorias/{{ $categoria->id }}">
		@method("PUT")
		@csrf
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" value = "{{ $categoria->nombre }}"></td>
			</tr>
			<tr>
				<td>Descripción</td>
				<td><input type="text" name="descripcion" value = "{{ $categoria->descripcion }}"></td>
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