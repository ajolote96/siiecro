@extends('adminlte::layouts.app')


@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="box">
    <div class="box-body"  >
        <div class="panel">
            <h1>Obra: {{ $obra->id }} </h1>
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
            <div class="form-group">
                <div class="input-group" >
                    <label for="id" class="input-group-addon">ID</label>
                    <input type="text" name="id" value="{{ $obra->id }}" class="form-control" style="width:200px">
                </div>

                <div class="input-group" >
                    <label for="titulo_obra" class="input-group-addon">Titulo Obra</label>
                    <input type="text" name="titulo_obra" value="{{ $obra->titulo_obra}}" class="form-control" style="width:200px">   
                </div>

                <div class="input-group" >
                    <label for="temp_obra" class="input-group-addon">Temporalidad</label>
                    <input type="text" name="temp_obra" value="{{ $obra->temp_obra}}" class="form-control" style="width:200px">   
                </div>
            </div><br><br>
            
            <div class="form-group">
            <div class="input-group" >
            <label for="caract_descrip" class="input-group-addon">Caracteristicas Descriptivas</label>
            <input type="text" name="caract_descrip" value="{{ $obra->caract_descrip}}" class="form-control" style="width:200px">
            </div>

            <div class="input-group" >
            <label for="año" class="input-group-addon">Año de la Obra</label>
            <input type="text" name="año" value="{{ $obra->año}}" class="form-control" style="width:200px">  
            </div>

            <div class="input-group" >
            <label for="epoca_obra" class="input-group-addon">Epoca de la Obra</label>
            <input type="text" name="epoca_obra" value="{{ $obra->epoca_obra}}" class="form-control" style="width:200px">    
            </div>
           </div><br><br>
        

            

            <div class="form-group">
            <div class="input-group" >
                <label for="tipo_bien_cultu" class="input-group-addon">Tipo de bien cultural</label>
                <input type="text" name="tipo_bien_cultu" value="{{ $obra->tipo_bien_cultu}}" class="form-control" style="width:200px">  
                 </div>

            <div class="input-group" >
                <label for="tipo_obj_obra" class="input-group-addon">Tipo de objeto obra</label>
                <input type="text" name="tipo_obj_obra" value="{{ $obra->tipo_obj_obra}}" class="form-control" style="width:200px">   
                 </div>
  
            <div class="input-group" >
                <label for="lugar_proce_ori" class="input-group-addon">Lugar de procedencia original</label>
                <input type="text" name="lugar_proce_ori" value="{{ $obra->lugar_proce_ori}}" class="form-control" style="width:200px"> 
                 </div>
            </div><br><br>
                 
            <div class="form-group">
                 <div class="input-group" >
                <label for="lugar_proce_act" class="input-group-addon">Lugar de procedencia actual</label>
                <input type="text" class="form-control"  value="{{ $obra->lugar_proce_act }}" name="lugar_proce_act" style="width:200px">
                 </div>
             

                <div class="input-group" >
                <label for="no_inv_obra" class="input-group-addon">Numero inventario de obra</label>
                <input type="text" name="no_inv_obra" value="{{ $obra->no_inv_obra}}" class="form-control" style="width:200px"> 
                 </div>

            <div class="input-group" >
                <label for="forma_ingreso" class="input-group-addon">Forma de ingreso</label>
                <input type="text" name="forma_ingreso" value="{{ $obra->forma_ingreso}}" class="form-control" style="width:200px"> 
                 </div>
            </div><br><br>

            <div class="form-group">
            <div class="input-group" >
                <label for="sector_obra" class="input-group-addon">Sector de Obra</label>
                <input type="text" name="sector_obra" value="{{ $obra->sector_obra}}" class="form-control" style="width:400px">
                 </div>
            
            
                <div class="input-group" >
                <label for="respon_ecro" class="input-group-addon">Responsable de la ECRO</label>
                <input type="text" name="respon_ecro" value="{{ $obra->respon_ecro}}" class="form-control" style="width:200px">
                 </div>
      
            <div class="input-group" >
                <label for="proyecto_obra" class="input-group-addon">Proyecto de la obra</label>
                <input type="text" name="proyecto_obra" value="{{ $obra->proyecto_obra}}" class="form-control" style="width:200px">
                 </div></div><br><br>
            <div class="form-group">
            <div class="input-group" >
                <label for="año_trabajo_obra" class="input-group-addon">Año de temporada de trabajo</label>
                <input type="text" name="año_trabajo_obra" value="{{ $obra->año_trabajo_obra}}" class="form-control" style="width:200px">  
                 </div>
            
            <div class="input-group" >
                <label for="no_proyec_obra" class="input-group-addon">No. de proyecto de la obra</label>
                <input type="text" name="no_proyec_obra" value="{{ $obra->no_proyec_obra}}" class="form-control" style="width:200px">   
                 </div>
             </div><br><br>
              <div class="input-group" >
            <label for="autor" class="input-group-addon">Autor</label>
            <input type="text" name="autor" value="{{ $obra->autor}}" class="form-control" style="width:200px">  
            </div>
             <div class="input-group" >
            <label for="cultura" class="input-group-addon">Cultura</label>
            <input type="text" name="cultura" value="{{ $obra->cultura}}" class="form-control" style="width:200px">  
            </div><br><br>
    

            <div class="form-group">
                <label class="input-group">Año confirmado</label>
                <select class="input-group-addon" name="año_confirm" id="año_c" value="{{ $obra->año_confirm }}"  style="width:200px">
                    <option value="" >Selecciona una opcion</option>
                    <option @if(old('año_confirm',$obra->año_confirm) == 'si') selected @endif>si</option>
                    <option @if(old('año_confirm',$obra->año_confirm) == 'no') selected @endif>no</option>
                </select><br>
                            
                <label class="input-group">Año aproximado</label> 
                <select class="input-group-addon" name="año_aproxi"  style="width:200px">
                    <option value="" >Selecciona una opcion</option>
                    <option @if(old('año_aproxi',$obra->año_aproxi) == 'si') selected @endif>si</option>
                    <option @if(old('año_aproxi',$obra->año_aproxi) == 'no') selected @endif>no</option>
                </select><br>
                           
                <label class="input-group">Epoca confirmada</label> 
                <select class="input-group-addon" name="epoca_confirm" value="{{ $obra->epoca_confirm }}" style="width:200px">
                    <option value="" >Selecciona una opcion</option>
                    <option @if(old('epoca_confirm',$obra->epoca_confirm) == 'si') selected @endif>si</option>
                    <option @if(old('epoca_confirm',$obra->epoca_confirm) == 'no') selected @endif>no</option>
                </select><br>
                            
                <label class="input-group">Epoca aproximada</label> 
                <select class="input-group-addon" name="epoca_aproxi" value="{{ $obra->epoca_aproxi }}" style="width:200px">
                    <option value="" >Selecciona una opcion</option>
                    <option @if(old('epoca_aproxi',$obra->epoca_aproxi) == 'si') selected @endif>si</option>
                    <option @if(old('epoca_aproxi',$obra->epoca_aproxi) == 'no') selected @endif>no</option>
                </select>
                </div><br><br>
            <div class="col-xs-3">
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"> Fecha de entrada</i>
                    </div>
                        <input type="date" class="form-control date" name="fecha_de_entrada" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $obra->fecha_de_entrada }}" style="width:250px">
                </div><br>
                <div class="input-group date">
                    <div class="input-group-addon">
                         <i class="fa fa-calendar"> Fecha de salida</i>
                    </div>
                    <input type="date" class="form-control pull-right" name="fecha_de_salida" placeholder="mm/dd/aaaa (Fecha de salida)" value="{{ $obra->fecha_de_salida }}" style="width:250px">
                </div>
            </div><br><br><br><br><br>
      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="{{route('Obras.index')}}" class="btn btn-danger btn-sm">Cancelar</a>
        </div>
    
   
</form>
                            
  

   

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection