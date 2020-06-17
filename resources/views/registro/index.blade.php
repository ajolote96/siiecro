@extends('adminlte::layouts.app')
 
@section('main-content')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif
<div class="box">
	<div class="box-body">
		<div class="panel">
			<h1>
			Registro de Análisis Científico
			{{ Form::open(['route' => 'registro.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
			<div class="form-group">
				<input  class="form-control" type="text" name="id_obra" placeholder="ID">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
			{{ Form::close() }}
			</h1>
		</div>
		<div style="overflow-x: auto; ">
			<div>
				<table id="tablaObras" class="table table-hover" role="grid" align="center">
					<thead >
        				<tr align="center" >
        					<th>ID de Registro</th>
        					<th>ID Obra</th>
        					<th>Titulo de la Obra</th>
				            <th>temporada de obra</th>
				            <th>Epoca de la Obra</th>
				            <th>Lugar de procedencia original</th>
				            <th>Lugar de procedencia actual</th>
				            <th>Profesor responsable del Análisis Científico</th>
				            <th>Proyecto de la Obra</th>
				            <th>Año de proyecto</th>
                            <th>Fecha de inicio</th>
                            <th>Foto</th>
            				<th>Acción</th>
        				</tr>
       				</thead>
       				<tbody>
       					@foreach ($a_cientifico as $cienti)
       					<tr align="center">
       						<td>{{ $cienti->idcientifico }}</td>
       						<td>{{ $cienti->id_obras }}</td>
				            <td>{{ $cienti->titulo_obra }}</td>
				            <td>{{ $cienti->temp_trabajo }}</td>
				            <td>{{ $cienti->epoca }}</td>
				            <td>{{ $cienti->lugar_p_origen }}</td>
				            <td>{{ $cienti->lugar_p_actual }}</td>
				            <td>{{ $cienti->profesor_responsable }}</td>
				            <td>{{ $cienti->proyecto_ecro }}</td>
				            <td>{{ $cienti->año_proyecto }}</td>
                            <td>{{ \Carbon\Carbon::parse($cienti->fecha_inicio)->format('d/m/Y') }}</td>
                            @if($cienti->esquema == 'Sin imagen')
                            <td>Sin imagen</td>
                            @else
                            <td><a target="_blank" href="{{ "images/$cienti->esquema" }}"><img  width="200px" src="images/{{ $cienti->esquema }}" class="zoom"></a></td>
                            @endif
				            <td>
				            	<td><a href="{{ route('registro.show', $cienti->idcientifico) }}" class="btn btn-block btn-info btn-xs" style="width:70px;">Ver mas</a></td>
				            	
				            	<td><a href="{{ route('registro.editar', $cienti->idcientifico) }}" class="btn btn-block btn-warning btn-xs" style="width:70px;">Editar</a></td>
				            	<td><a href="javascript: document.getElementById('delete-{{ $cienti->idcientifico }}').submit()" class="btn btn-block btn-danger btn-xs" onclick="return confirm('¿Seguro que deseas eliminarlo?')" style="width:70px;">Eliminar</a></td>
				            	
				            	<form id="delete-{{ $cienti->idcientifico }}" action="{{ route('registro.destroy', $cienti->idcientifico) }}" method="POST">
		                    	@method('delete')
		 						@csrf
                			</form>
            				</td>
        				</tr>
          				@endforeach
    				</tbody>
    			</table>
                <div align="center">
                	{!!$a_cientifico->links()!!}  
                </div>
			</div>
		</div>				 	
  	</div>
</div>
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endsection