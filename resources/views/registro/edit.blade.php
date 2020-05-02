@extends('adminlte::layouts.app')
 
@section('main-content')

<!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>{{ $Obrasg->first()->id }}
@endif-->
<div class="box">
    <div class="box-body"  >
            <div class="panel">
                <h1>Editar Solicitud de Análisis Científico 
			
</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Vaya!</strong> Algo salio mal.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('registro.actualizar', $a_cientifico->idcientifico) }}" method="POST" class="form-inline text-left" enctype="multipart/form-data">
                    @method('put')
                    @csrf 
                    <BR>
                    <div class="form-group">
                        <div class="form-group">
                            
                            <div class="input-group" >
                                <label for="id_obras" class="input-group-addon">ID Obra </label>
                                <input type="text" name="id_obras" class="form-control"  value="{{ $a_cientifico->id_obras }}" style="width:200px" readonly><BR>    
                            </div>
                            <div class="input-group" >
                                <label for="titulo_obra" class="input-group-addon">Titulo de la obra/pieza</label>
                                <input type="text" name="titulo_obra" class="form-control"  value="{{ $a_cientifico->titulo_obra }}" style="width:200px" readonly><BR> 
                            </div>
                            <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Temporalidad</span>
                                <input type="text" name="temp_trabajo" class="form-control"  value="{{ $a_cientifico->temp_trabajo }}" style="width:200px" readonly>
                            </div>
                            </div><br><br>
                        
                            
                        <div class="form-group">
                            <div class="input-group ">
                                <label for="epoca_obra" class="input-group-addon">Epoca de la obra</label>
                                <input type="text" name="epoca" class="form-control"  value="{{ $a_cientifico->epoca }}" style="width:200px" readonly>
                            </div>                            
                            <div class="input-group">
                                <label for="lugar_proce_ori" class="input-group-addon">Lugar de procedencia original</label>
                                <input type="text" class="form-control"  name="lugar_p_origen"  value="{{ $a_cientifico->lugar_p_origen }}" style="width:200px"readonly>
                            </div>
                            <div class="input-group">
                                <label for="lugar_proce_act" class="input-group-addon">Lugar de procedencia actual</label>
                                <input type="text" class="form-control"  name="lugar_p_actual"  value="{{ $a_cientifico->lugar_p_actual }}" style="width:200px" readonly>
                            </div>
                        </div><br><br>
                    <div class="form-group">
                    <div class="input-group">
                        <label for="proyecto_ecro" class="input-group-addon">Proyecto de la obra</label>
                        <input type="text" class="form-control"  name="proyecto_ecro"  value="{{ $a_cientifico->proyecto_ecro }}" style="width:200px" readonly>
                    </div>
                    <div class="input-group">
                        <label for="año_proyecto" class="input-group-addon">Año de proyecto de la obra</label>
                        <input type="text" class="form-control"  name="año_proyecto" value="{{ $a_cientifico->año_proyecto }}" style="width:200px" readonly>
                    </div>
                </div><br><br>
                    <div class="input-group">
                        <div class="input-group date">
                        <div class="input-group-addon">
                             <i class="fa fa-calendar"> Fecha de inicio</i>
                        </div>
                        <input type="date" class="form-control date" name="fecha_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $a_cientifico->fecha_inicio }}" style="width:262px" readonly>
                    </div>
                    </div>
                    </div><br><br><br>
                    <div class="form-group">
                    <div class="input-group">
                        <label for="tecnica" class="input-group-addon">Tecnica</label>
                        <input type="text" class="form-control"  name="tecnica" value="{{ $a_cientifico->tecnica }}" style="width:200px" readonly>
                    </div>
                    <div class="input-group">
                        <label for="autor" class="input-group-addon">Autor</label>
                        <input type="text" class="form-control"  name="autor" value="{{ $a_cientifico->autor }}" style="width:200px" readonly>
                    </div><br><br>
                    
                <div class="form-group">
                    <div class="input-group">
                        <label for="nomenclatura_muestra" class="input-group-addon">Nomenclatura de la muestra</label>
                        <input type="text" class="form-control"  name="nomenclatura_muestra" value="{{ $a_cientifico->nomenclatura_muestra }}" style="width:200px" >
                    </div> 
                    <div class="input-group">
                        <label for="caracte_analisis" class="input-group-addon">Caracterizacion de analisis</label>
                        <input type="text" class="form-control"  name="caracte_analisis" value="{{ $a_cientifico->caracte_analisis }}" style="width:200px" >
                    </div> 
                    </div><br><br>
                    <div class="input-group date">
                        <div class="input-group-addon">
                             <i class="fa fa-calendar"> Fecha de analisis cientifico</i>
                        </div>
                        <input type="date" class="form-control date" name="fecha_analisis_cientifico" value="{{ $a_cientifico->fecha_analisis_cientifico }}" style="width:262px">
                    </div> <br><br>  
                    <div class="form-group">
                    <div class="input-group">
                        <label for="profesor_responsable" class="input-group-addon">Profesor responsable</label>
                        <input type="text" class="form-control"  name="profesor_responsable" value="{{ $a_cientifico->profesor_responsable }}" style="width:200px" >
                    </div> 
                    <div class="input-group">
                        <label for="persona_realizo_analisis" class="input-group-addon">Persona que realizo el analisis</label>
                        <input type="text" class="form-control"  name="persona_realizo_analisis" value="{{ $a_cientifico->persona_realizo_analisis }}" style="width:200px" >
                    </div> 
                    <div class="input-group">
                        <label for="forma_obtencion_muestra" class="input-group-addon">Forma de obtencion de las muestras</label>
                        <input type="text" class="form-control"  name="forma_obtencion_muestra" value="{{ $a_cientifico->forma_obtencion_muestra }}" style="width:200px" >
                    </div> 
                    </div><br><br>
                    <div class="form-group">
                    <div class="input-group">
                        <label for="esquema" class="input-group-addon">Esquema</label>
                        <input type="file" class="form-control"  name="esquema">
                    </div>  
                    <div class="input-group">
                        <label for="indicaciones" class="input-group-addon">Indicaciones</label>
                        <input type="text" class="form-control"  name="indicaciones" value="{{ $a_cientifico->indicaciones }}" style="width:200px" >
                    </div>      
                    </div><br><br>

                    <div class="form-group">
                    <div class="input-group">
                        <label for="tipo_material" class="input-group-addon">Tipo de material</label>
                        <input type="text" class="form-control"  name="tipo_material" value="{{ $a_cientifico->tipo_material }}" style="width:200px" >
                    </div>
                    <div class="input-group">
                        <label for="descripcion" class="input-group-addon">Descripcion</label>
                        <input type="text" class="form-control"  name="descripcion" value="{{ $a_cientifico->descripcion }}" style="width:200px" >
                    </div>
                    <div class="input-group">
                        <label for="microfotografia" class="input-group-addon">Microfotografia</label>
                        <input type="file" class="form-control"  name="microfotografia" value="{{ $a_cientifico->microfotografia }}">
                    </div>        
                    </div><br><br>
                    <div class="input-group">
                        <label for="info_definir" class="input-group-addon">Informacion por definir</label>
                        <input type="text" class="form-control"  name="info_definir" value="{{ $a_cientifico->info_definir }}">
                    </div><br><br>
                    <div class="form-group">
                    <div class="input-group">
                        <label for="analisis_microestructural" class="input-group-addon">Analisis microestructural</label>
                        <input type="text" class="form-control"  name="analisis_microestructural" value="{{ $a_cientifico->analisis_microestructural }}">
                    </div>
                    <div class="input-group">
                        <label for="analisis_microquimico" class="input-group-addon">Analisis microquimico</label>
                        <input type="text" class="form-control"  name="analisis_microquimico" value="{{ $a_cientifico->analisis_microquimico }}">
                    </div> 
                    <div class="input-group">
                        <label for="analisis_elemental" class="input-group-addon">Analisis microelemental</label>
                        <input type="text" class="form-control"  name="analisis_elemental" value="{{ $a_cientifico->analisis_elemental }}">
                    </div>
                    </div><br><br>
                    <div class="form-group">
                    <div class="input-group">
                        <label for="analisis_molecular" class="input-group-addon">Analisis molecular</label>
                        <input type="text" class="form-control"  name="analisis_molecular" value="{{ $a_cientifico->analisis_molecular }}">
                    </div>
                    <div class="input-group">
                        <label for="analisis_de_tincion" class="input-group-addon">Analisis de tincion</label>
                        <input type="text" class="form-control"  name="analisis_de_tincion" value="{{ $a_cientifico->analisis_de_tincion }}">
                    </div> 
                    <div class="input-group">
                        <label for="otros" class="input-group-addon">otros</label>
                        <input type="text" class="form-control"  name="otros" value="{{ $a_cientifico->otros }}">
                    </div>
                    </div><br><br>  
                    <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Capturar</button>
                            <a href="{{route('registro.index')}}" class="btn btn-danger btn-sm">Cancelar</a>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection