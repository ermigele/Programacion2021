<table border= 1.5px>
<thead>
<th>Nombre</th>
<th>Direccion</th>
</thead>
<tbody>
@foreach($centros as $x)
<tr>
<td>{{$x->nombre}}</td>
<td>{{$x->direccion}}</td>
</tr>
@endforeach
</tbody>
</table>