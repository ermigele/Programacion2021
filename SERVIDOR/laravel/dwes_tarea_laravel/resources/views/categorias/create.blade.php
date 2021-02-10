@extends("../layouts.plantilla")

@section("cabecera")
	Insertar una nuevo Categoria
@endsection

@section("cuerpo")
	<form method="post" action="/categorias">
		@csrf
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr>
				<td>Descripción</td>
				<td><input type="text" name="descripcion"></td>
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