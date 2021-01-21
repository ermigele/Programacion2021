<table border= 1.5px>
<thead>
<th>Nombre</th>
<th>Apellidos</th>
<th>Salario</th>
<th>Hijos</th>
</thead>
<tbody>
@foreach($empleados as $x)
<tr>
<td>{{$x->nombre}}</td>
<td>{{$x->apellidos}}</td>
<td>{{$x->salario}}</td>
<td>{{$x->hijos}}</td>
</tr>
@endforeach
</tbody>
</table>