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
			Obras Registradas
			{{ Form::open(['route' => 'Obras.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
			<div class="form-group">
				{{ Form::text('busqueda', null, ['class' => 'form-control', 'placeholder' => 'ID'])}}
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
				<table id="tablaObras" class="table table-hover" role="grid" >
					<thead >
        				<tr>
        					<th>id</th>
        					<th>Obra</th>
        					<th>Año</th>
        					<th>Epoca</th>
        					<th>Temporalidad</th>
        					<th>Tipo de Objeto</th>
				            <th>Sector de la obra</th>
            				<th>Acción</th>
        				</tr>
       				</thead>
       				<tbody>
       					@foreach ($Obras as $Obra)
       					<tr>
       						
       						<td>{{ $Obra->id_de_obras }}</td>
				            <td>{{ $Obra->titulo_obra }}</td>
				            <td>{{ $Obra->año }}</td>
				            <td>{{ $Obra->epoca_obra }}</td>
				            <td>{{ $Obra->temp_obra }}</td>
				            <td>{{ $Obra->tipo_obj_obra }}</td>
				            <td>{{ $Obra->sector_obra }}</td>
				            <td>
				            
							
				            <td><a href="{{ route('Obras.show', $Obra->id) }}" class="btn btn-block btn-info btn-xs" style="width:70px;">Ver mas</a></td>
				            

				            @permission('Editar_Registro_Bloqueo_Redireccion')
		                    <td><a href="{{ route('Obras.editar', $Obra->id) }}" class="btn btn-block btn-warning btn-xs" style="width:70px;">Editar</a></td>
		                    @endpermission
		                    
		                    <td>


							<form id="delete-{{ $Obra->id }}" action="{{ route('Obras.destroy', $Obra->id) }}" method="POST">
								<a href="javascript:document.getElementById('delete-{{ $Obra->id }}').submit()" class="btn btn-block btn-danger btn-xs" onclick="return confirm('¿Seguro que deseas eliminarlo?')" style="width:70px;">Eliminar</a>
		                    @method('delete')
		 					@csrf
                			</form>
  							

		                    </td>
		                    
		                    <td><a href="{{ route('analisisg.create', $Obra->id) }}" class="btn btn-block btn-success btn-xs" style="width:90px;">Agregar ficha</a></td>
		                   
							<td><a target="_blank" href="{{ route('Obras.pdf', $Obra->id) }}" class="btn btn-block btn-success btn-xs" style="width:90px;">Imprimir</a></td>

		                    
            				</td>
        				</tr> 
          				@endforeach
    				</tbody>
       					
    			</table>
                <div align="center">
                {!!$Obras->links()!!}  
                </div>
  
		</div>
	</div>				 	
  </div>
</div>
   
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

      
@endsection