@extends('adminlte::layouts.app')
 <?php
  $analisisg = $analisisgs->first();
$contador_soporte = 0;
$contador_base = 0;
$contador_estratigrafia = 0;
?>
@section('main-content')

<!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>{{ $Obrasg->first()->id }}
@endif-->
<div class="box">
    <div class="box-body"  >
            <div class="panel">
                <h1 style="background-color: grey; color:white; text-align:center;">Editar Solicitud de Análisis Científico </h1>


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
                <form action="{{ route('analisisg.actualizar', $analisisg->id_general) }}" method="POST" class="form-inline text-left" enctype="multipart/form-data">
                    @method('put')
                    @csrf 

                    <BR>
                    <div class="form-group">
                        <div class="form-group">
                            
                            <input type="hidden" name="id_obra" class="form-control"  value="{{ $analisisg->id_obra }}" style="width:200px" readonly>

                            <div class="input-group" >
                                <label for="id_de_obra" class="input-group-addon" style="width: 300px; border:0;">ID Obra </label>
                                <input type="text" name="id_de_obra" class="form-control"  value="{{ $analisisg->id_de_obra }}" style="width:500px; text-align:center; " readonly><BR>    
                            </div>
                            <br><br>
                            <div class="input-group" >
                                <label for="titulo_obra" class="input-group-addon"style="width: 300px; border:0;">Titulo de la obra/pieza</label>
                                <input type="text" name="titulo_obra" class="form-control"  value="{{ $analisisg->titulo_obra }}" style="width:500px; text-align:center; " readonly><BR> 
                            </div>
                            <br><br>
							<div class="form-group">
							<div class="input-group">
                                <span class="input-group-addon"style="width: 300px; border:0;">Temporalidad</span>
                                <input type="text" name="temp_obra" class="form-control"  value="{{ $analisisg->temp_obra }}" style="width:500px; text-align:center; "readonly>
                            </div>
                        	</div><br><br>
                        
                            <div class="input-group ">
                                <label for="epoca_obra" class="input-group-addon"style="width: 300px; border:0;">Epoca de la obra</label>
                                <input type="text" name="epoca_obra" class="form-control"  value="{{ $analisisg->epoca_obra }}" style="width:500px; text-align:center; " readonly>
                            </div>
                            <br><br>
                            <div class="input-group">
                                <label for="tipo_obj_obra" class="input-group-addon"style="width: 300px; border:0;">Tipo de objeto de la obra</label>
                                <input type="text" name="tipo_obj_obra" class="form-control"  value="{{$analisisg->tipo_obj_obra }}" style="width:500px; text-align:center; " readonly>
                            </div>
                        </div><br><br>
                        
                        
                    	<div class="form-group">
                    
                    
                    
                    <div class="input-group">
                        <label for="respon_intervencion" class="input-group-addon"style="width: 300px; border:0;">Responsable de la Intervencion</label>
                        <input type="text" class="form-control"  name="respon_intervencion"  value="{{ $analisisg->respon_intervencion }}" style="width:500px; text-align:center; ">
                    </div>
                    
                </div><br><br>
                      <div class="input-group">
                        <label for="foto" class="input-group-addon"style="width: 300px; border:0;">Foto</label>
                        <input type="file" class="form-control"  name="foto" value="{{ $analisisg->foto}}" style="width:500px; text-align:center; ">
                    </div>
                <br><br>
                    <div class="input-group" >
                    <div class="input-group date">

                        <div class="input-group-addon">
                             <i class="fa fa-calendar" class="input-group-addon"style="width: 300px; border:0;"> Fecha de entrada</i>

                        </div>

                        <input type="date" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $analisisg->fecha_de_inicio }}" style="width:500px; text-align:center; ">
                    </div>
                
                    
                    
                    </div><br><br>
                    
                    

                    <div class="input-group">
                        <div class="input-group">
                            <label class="input-group-addon">Dimensiones</label>
                            <label class="input-group-addon">Alto</label>
                            <input type="text" class="form-control" name="alto" value="{{ $analisisg->alto}}"><br>
                            <label class="input-group-addon">Ancho</label>
                            <input type="text" class="form-control" name="ancho" value="{{ $analisisg->ancho}}"><br>
                            <label class="input-group-addon">Profundidad</label>
                            <input type="text" class="form-control" name="profundidad" value="{{ $analisisg->profundidad}}"><br>
                            <label class="input-group-addon">Diametro</label>
                            <input type="text" class="form-control" name="diametro" value="{{ $analisisg->diametro}}"><br>
                        </div>
                        
                    </div><br><br>
                    
                    
                </div><br><br>
               
               @foreach($soportes as $soporte)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered"><strong>SOPORTE</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #C65911; color:white;">Número de muestra</th>
                                <th style="background-color: #C65911; color:white;">Nomenclatura</th>
                                <th style="background-color: #C65911; color:white;">Información requerida</th>
                                <th style="background-color: #C65911; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #C65911; color:white;">Ubicación</th>
                                <th style="background-color: #C65911; color:white;">Responsable</th>
                                <th style="background-color: #C65911; color:white;">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="Smuestra_edit{{$contador_soporte}}" value="{{ $soporte->soporte_muestra}}"></td>
                                <td><input type="text" name="Snomenclatura_edit{{$contador_soporte}}" value="{{ $soporte->soporte_nomenclatura}}"></td>
                                <td><input type="text" name="Sinf_requerida_edit{{$contador_soporte}}" value="{{ $soporte->soporte_inf_requerida}}"></td>
                                <td><input type="text" name="Sdes_muestra_edit{{$contador_soporte}}" value="{{ $soporte->soporte_des_muestra}}"></td>
                                <td><input type="text" name="Subicacion_edit{{$contador_soporte}}" value="{{ $soporte->soporte_ubicacion}}"></td>
                                <td><input type="text" name="Sresponsable_edit{{$contador_soporte}}" value="{{ $soporte->soporte_responsable}}"></td>
                                <td><input type="text" name="Siden_muestra_edit{{$contador_soporte}}" value="{{ $soporte->soporte_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_soporte +=1;
                  ?>
               @endforeach
               @if($soportes->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrosoporte" name="otrosoporte" class="btn-sm"  value="Agregar más" onclick="javascript:massoporte()">
                </div>
                <div id="inputsoporte"></div><br>
                @endif
               @foreach($baseP as $basesP)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered"><strong>BASE DE PREPARACIóN</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FFCC66; color:white;">Número de muestra</th>
                                <th style="background-color: #FFCC66; color:white;">Nomenclatura</th>
                                <th style="background-color: #FFCC66; color:white;">Información requerida</th>
                                <th style="background-color: #FFCC66; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #FFCC66; color:white;">Ubicación</th>
                                <th style="background-color: #FFCC66; color:white;">Responsable</th>
                                <th style="background-color: #FFCC66; color:white;">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="BPmuestra_edit{{$contador_base}}" value="{{ $basesP->base_muestra}}"></td>
                                <td><input type="text" name="BPnomenclatura_edit{{$contador_base}}" value="{{ $basesP->base_nomenclatura}}"></td>
                                <td><input type="text" name="BPinf_requerida_edit{{$contador_base}}" value="{{ $basesP->base_inf_requerida}}"></td>
                                <td><input type="text" name="BPdes_muestra_edit{{$contador_base}}" value="{{ $basesP->base_des_muestra}}"></td>
                                <td><input type="text" name="BPubicacion_edit{{$contador_base}}" value="{{ $basesP->base_ubicacion}}"></td>
                                <td><input type="text" name="BPresponsable_edit{{$contador_base}}" value="{{ $basesP->base_responsable}}"></td>
                                <td><input type="text" name="BPiden_muestra_edit{{$contador_base}}" value="{{ $basesP->base_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_base +=1;
                  ?>
               @endforeach
               @if($baseP->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrobase" name="otrobase" class="btn-sm"  value="Agregar más" onclick="javascript:masbase()">
                </div>
                <div id="inputbase"></div><br>
                @endif

                @foreach($estratigrafia as $estratigrafias)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered"><strong>ESTRATIGRAFÍA</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #008000; color:white;">Número de muestra</th>
                                <th style="background-color: #008000; color:white;">Nomenclatura</th>
                                <th style="background-color: #008000; color:white;">Información requerida</th>
                                <th style="background-color: #008000; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #008000; color:white;">Ubicación</th>
                                <th style="background-color: #008000; color:white;">Responsable</th>
                                <th style="background-color: #008000; color:white;">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="Emuestra_edit{{$contador_estratigrafia}}" value="{{ $estratigrafias->estratigrafia_muestra}}"></td>
                                <td><input type="text" name="Enomenclatura_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_nomenclatura}}"></td>
                                <td><input type="text" name="Einf_requerida_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_inf_requerida}}"></td>
                                <td><input type="text" name="Edes_muestra_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_des_muestra}}"></td>
                                <td><input type="text" name="Eubicacion_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_ubicacion}}"></td>
                                <td><input type="text" name="Eresponsable_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_responsable}}"></td>
                                <td><input type="text" name="Eiden_muestra_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_estratigrafia +=1;
                  ?>
               @endforeach
               @if($estratigrafia->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrobase" name="otrobase" class="btn-sm"  value="Agregar más" onclick="javascript:masestratigrafia()">
                </div>
                <div id="inputestratigrafia"></div><br>
                @endif
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                            <a href="{{route('analisisg.index')}}" class="btn btn-danger btn-sm">Cancelar</a>
                    </div>
                </form>
        </div>
	</div>
</div>
@endsection