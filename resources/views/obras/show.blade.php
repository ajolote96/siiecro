@extends('adminlte::layouts.app')


@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="box">
    <div class="box-body"  >
        <div class="panel">
            <h1 align="center">Obra: {{ $obra->id }} </h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Vaya!</strong> Parece que algo hiciste mal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('Obras.actualizar', $obra->id) }}" method="POST" class="form-inline text-left">
    @csrf
  
     <BR>
            <table style="width: 65%" border="0" align="center">
<tr ><th colspan="5"style="text-align:center;background-color: #7C858C; color:white;"><h3>Datos Generales</h3></th></tr>

@permission('Consulta_General_Basica','Consulta_General_Avanzada_2')
@if($obra->id_de_obras != NULL)
  <tr>
    <td style="font-size:25px; width:700px;">ID de Obra:</td>
    <td style="font-size:25px;"><input type="text" readonly name="id_de_obras" class="form-control" placeholder="ID de la Obra"  value="{{ $obra->id_de_obras }}" style="width:550px; font-size:18px;"></td>
  </tr>
  @endif
@endpermission
@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2','Consulta_Externa'])
<tr>
  <td style="font-size:25px;">Titulo de la Obra:</td>
    <td style="font-size:25px;"><input type="text" readonly name="titulo_obra" class="form-control" placeholder="Titulo de la Obra" value="{{ $obra->titulo_obra }}" style="width:550px; font-size:18px;"></td>
</tr>
@if($obra->autor != NULL)
<tr>
  <td style="font-size:25px;">Autor:</td>
  <td style="font-size:25px;"><input type="text" readonly class="form-control"  name="autor" placeholder="Autor" value="{{ $obra->autor }}" style="width:550px; font-size:18px;"></td>
</tr>
@endif
@if($obra->cultura != NULL)
<tr>
  <td style="font-size:25px;">Cultura:</td>
  <td style="font-size:25px;"><input type="text" readonly class="form-control"  name="cultura" placeholder="Cultura" value="{{ $obra->cultura }}" style="width:550px; font-size:18px;"></td>
</tr>
@endif
<tr>
  <td style="font-size:25px;">Tipo de Bien Cultural:</td>
  <td style="font-size:25px;"><input type="text" readonly class="form-control" name="tipo_bien_cultu" value="{{ $obra->tipo_bien_cultu }}" style="width:550px; font-size:18px;">
  </td>
</tr>

<tr>
  <td style="font-size:25px;">Tipo de Objeto de la Obra:</td>
  <td style="font-size:25px;"><input type=""  type="text" name="tipo_obj_obra" readonly class="form-control" placeholder="Tipo de Objeto de la Obra" value="{{ $obra->tipo_obj_obra }}" style="width:550px; font-size:18px;">
  </td>
</tr>
@endpermission
@permission('Consulta_General_Basica','Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:25px;">Lugar de Procedencia Actual:</td>
  <td style="font-size:25px;"><input type="text" readonly class="form-control" placeholder="Lugar de Procedencia Actual" name="lugar_proce_act"  value="{{ $obra->lugar_proce_act }}" style="width:550px; font-size:18px;"></td>
</tr>
@endpermission
@permission('Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:25px;">Lugar de Procedencia Original:</td>
  <td style="font-size:25px;"><input type="text" readonly class="form-control"  name="lugar_proce_ori" placeholder="Lugar de Procedencia Original" value="{{ $obra->lugar_proce_ori }}" style="width:550px; font-size:18px;"></td>
</tr>
<tr>
    <td style="font-size:25px;">No. de inventario de la Obra o Códigos de Procedencia:</td>
    <td style="font-size:25px;"><input type="text" readonly class="form-control"  name="no_inv_obra" placeholder="No. de inventario de la Obra o Códigos de Procedencia" value="{{ $obra->no_inv_obra }}" style="width:550px; font-size:18px;"></td>
  </tr>
  @endpermission
@permission('Consulta_General_Basica','Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:25px;">Características Descriptivas:</td>
  <td style="font-size:25px;"><input type="text" readonly name="caract_descrip" class="form-control" placeholder="Características Descriptivas" value="{{ $obra->caract_descrip }}" style="width:550px; font-size:18px;"></td>
</tr>
@endpermission
@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2','Consulta_Externa'])
<tr>
  <td style="font-size:25px;">Temporalidad:</td>
  <td style="font-size:18px;"><input  type="text" readonly name="temp_obra" class="form-control" placeholder="Temporalidad" value="{{ $obra->temp_obra }}" style="width:550px; font-size:18px;"></td>
</tr>
@if($obra->año != NULL)
<tr>
  <td style="font-size:25px;">Año de la Obra:</td>
  <td style="font-size:23px;"><input type="text" readonly name="año" class="form-control" placeholder="Año de la Obra" value="{{ $obra->año }}" style="width:550px; font-size:18px;"></td>
</tr>
@endif
@if($obra->epoca_obra != NULL)
<tr>
  <td style="font-size:25px;">Epoca de la Obra:</td>
  <td style="font-size:25px;"><input  type="text" name="epoca_obra" readonly class="form-control" placeholder="Epoca de la Obra" value="{{ $obra->epoca_obra }}" style="width:550px; font-size:18px;"></td>
</tr>
@endif
@endpermission
@permission('Consulta_General_Basica','Consulta_General_Avanzada_2')
@if($obra->año_confirm != NULL)
<tr>
  <td style="font-size:25px;">Año de la Obra Confirmado</td>
  <td style="font-size:25px;"><input type="text" readonly class="form-control" name="año_confirm"  value="{{ $obra->año_confirm }}"  style="width:550px; font-size:18px;"></td>
</tr>
@endif
@if($obra->año_aproxi != NULL)
<tr>
  <td style="font-size:25px;">Año de la Obra Aproximado:</td>
  <td style="font-size:25px;"><input type="text" class="form-control" readonly name="año_aproxi" value="{{ $obra->año_aproxi }}" style="width:550px; font-size:18px;"></td>
</tr>
@endif
@if($obra->epoca_confirm != NULL)
<tr>
  <td style="font-size:25px;">Epoca de la Obra Confirmada:</td>
  <td><input type="text"  class="form-control" name="epoca_confirm" readonly value="{{ $obra->epoca_confirm }}" style="width:550px; font-size:18px;">
  </td>
</tr>
@endif
@if($obra->epoca_aproxi != NULL)
<tr>
  <td style="font-size:25px;">Epoca de la Obra Aproximada:</td>
  <td style="font-size:25px;"><input type="text" readonly class="form-control" name="epoca_aproxi" value="{{ $obra->epoca_aproxi }}" style="width:550px; font-size:18px;">
  </td>
</tr>
@endif
@endpermission


</table>



@permission('Consulta_General_Basica','Consulta_General_Avanzada_2')

<table style="width: 65%" border="0" align="center">

<tr ><th colspan="5"style="text-align:center;background-color: #7C858C; color:white;"><h3>Información de indentificación</h3></th></tr>
  @endpermission
@permission('Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:25px;">Forma de Ingreso:</td>
    <td style="font-size:25px;"><input readonly type="text" class="form-control"  name="forma_ingreso" placeholder="Forma de Ingreso" value="{{ $obra->forma_ingreso }}" style="width:550px; font-size:18px;"></td>
</tr>
@endpermission
@permission('Consulta_General_Basica','Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:25px;">Sector:</td>
  <td style="font-size:25px;"><input type="text" readonly class="form-control" name="sector_obra" value="{{ $obra->sector_obra }}" style="width:550px; font-size:18px;">
                           </td>
</tr>
@endpermission
@permission('Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:25px;">Responsable de la ECRO:</td>
  <td style="font-size:25px;"><input type="text" class="form-control" readonly name="respon_ecro" placeholder="Responsable de la ECRO" value="{{ $obra->respon_ecro }}" style="width:550px; font-size:18px;"></td>
</tr>
<tr>
  <td style="font-size:25px;">Fecha de Entrada:</td>
  <td style="font-size:25px;"><input type="date" class="form-control date" readonly name="fecha_de_entrada" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $obra->fecha_de_entrada }}" style="width:550px; font-size:18px;"></td>
</tr>
@endpermission
@permission('Consulta_General_Basica','Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:25px;">Nombre del Proyecto de la Obra:</td>
  <td style="font-size:25px;"><input type="text" class="form-control" readonly name="proyecto_obra" placeholder="Nombre del Proyecto de la Obra" value="{{ $obra->proyecto_obra }}" style="width:550px; font-size:18px;"></td>
</tr>
@endpermission
@permission('Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:25px;">No. de Proyecto de la Obra:</td>
  <td style="font-size:25px;"><input type="text" class="form-control" readonly placeholder="No. de Proyecto de la Obra" name="no_proyec_obra"  value="{{ $obra->no_proyec_obra }}" style="width:550px; font-size:18px;"></td>
</tr>
@endpermission
@permission('Consulta_General_Basica','Consulta_General_Avanzada_2')
<tr>
<td style="font-size:25px;">Año de Temporada de Trabajo:</td>
  <td style="font-size:25px; width:550px"><input type="text" readonly class="form-control" placeholder="Año de Temporada de Trabajo" name="año_trabajo_obra" value="{{ $obra->año_trabajo_obra }}" style="width:550px; font-size:18px;"></td>
</tr>
<tr>
    <td style="font-size:25px;">Temporada de Trabajo:</td>
  <td style="font-size:25px;"><input type="text" class="form-control" readonly placeholder="Temporada de Trabajo" name="temporada_trabajo" value="{{ $obra->temporada_trabajo }}" style="width:550px; font-size:18px;"></td>
</tr>
@endpermission
@permission('Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:25px;">Fecha de Salida:</td>
  <td><input type="date" class="form-control pull-right" name="fecha_de_salida" readonly placeholder="mm/dd/aaaa (Fecha de salida)" value="{{ $obra->fecha_de_salida }}" style="width:550px; font-size:18px;"></td>
</tr>
@endpermission


</table><br><br><br><br><br>
      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="{{route('Obras.index')}}" class="btn btn-danger btn-sm">Regresar</a>
        </div>
    
   
</form>
                            
  

   

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection