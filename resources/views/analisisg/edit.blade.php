@extends('adminlte::layouts.app')
 <?php
  $analisisg = $analisisgs->first();
$contador_soporte = 0;
$contador_base = 0;
$contador_estratigrafia = 0;
$contador_revoque = 0;
$contador_bol = 0;
$contador_laminas = 0;
$contador_pigmentos = 0;
$contador_aglutinante = 0;
$contador_recubrimiento = 0;


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
                <h1 style=" text-align:center;"> Solicitud de Análisis Científico </h1>


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

                    
                    <div align="center">
                    <table>
                    <tr ><th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos generales</h3></th></tr>
                        <tr>
                            
                           <td> <input type="hidden" name="id_obra" class="form-control"  value="{{ $analisisg->id_obra }}" style="width:200px" readonly></td>

                            <tr >
                            <td> <label for="id_de_obra" class="input-group-addon" style="width: 300px; border:0;">ID Obra </label></td>
                               <td> <input type="text" name="id_de_obra" class="form-control"  value="{{ $analisisg->id_de_obra }}" style="width:500px; text-align:center; "readonly></td>   
                            </tr>
                          
                            <tr >
                               <td> <label for="titulo_obra" class="input-group-addon"style="width: 300px; border:0;">Titulo de la obra/pieza</label></td> 
                               <td> <input type="text" name="titulo_obra" class="form-control"  value="{{ $analisisg->titulo_obra }}" style="width:500px; text-align:center; " readonly></td> 
                          </tr>
                            
						
							<tr>
                            <td> <span class="input-group-addon"style="width: 300px; border:0;">Temporalidad</span></td> 
                            <td>  <input type="text" name="temp_obra" class="form-control"  value="{{ $analisisg->temp_obra }}" style="width:500px; text-align:center; "readonly></td> 
                            </tr>
                           
                        
                            <tr>
                            <td>  <label for="epoca_obra" class="input-group-addon"style="width: 300px; border:0;">Epoca de la obra</label></td> 
                            <td>  <input type="text" name="epoca_obra" class="form-control"  value="{{ $analisisg->epoca_obra }}" style="width:500px; text-align:center; " readonly></td> 
                            </tr>
                           
                            <tr>
                            <td>  <label for="tipo_obj_obra" class="input-group-addon"style="width: 300px; border:0;">Tipo de objeto de la obra</label></td> 
                            <td>   <input type="text" name="tipo_obj_obra" class="form-control"  value="{{$analisisg->tipo_obj_obra }}" style="width:500px; text-align:center; " readonly> </td> 
                            </tr>
                        </tr>
                        
                        
                    	<tr>
                    
                    
                    
                        <tr>
                        <td><label for="respon_intervencion" class="input-group-addon"style="width: 300px; border:0;">Responsable de la Intervencion</label>
                        <td><input type="text" class="form-control"  name="respon_intervencion"  value="{{ $analisisg->respon_intervencion }}" style="width:500px; text-align:center; ">
                        </tr>
                    
                        </tr> 
                      <tr>
                      <td><label for="foto" class="input-group-addon"style="width: 300px; border:0;">Foto</label></td> 
                      <td><input type="file" class="form-control"  name="foto" value="{{ $analisisg->foto}}" style="width:500px; text-align:center; "></td> 
                    </tr>
  
                    <tr >
                    <tr>

                        
                        <td> <i class="fa fa-calendar" class="input-group-addon"style="width: 300px; border:0;"> Fecha de entrada</i></td> 

                       

                       <td> <input type="date" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $analisisg->fecha_de_inicio }}" style="width:500px; text-align:center; "></td> 
                   </tr>
                
                    
                    
                        </tr> 
                                       

                    
</table>

<br> <br>
<div align="left">
                    <table>
                        <tr>
                            <th></th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Alto</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Ancho</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Profundidad</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Diametro</th>
                        </tr>
                        <tr>
                            <th>Dimensiones</th>
                            <td><input type="text" class="form-control" name="alto" value="{{ $analisisg->alto}}" style="width:200px; text-align:center; "></td></td>
                            <td><input type="text" class="form-control" name="ancho" value="{{ $analisisg->ancho}}"style="width:200px; text-align:center; "></td></td>
                            <td><input type="text" class="form-control" name="profundidad" value="{{ $analisisg->profundidad}}"style="width:200px; text-align:center; "></td>
                            <td><input type="text" class="form-control" name="diametro" value="{{ $analisisg->diametro}}"style="width:200px; text-align:center; "></td>
                        </tr>
                    </table>
</div>











</div>
<h2 style="background-color: grey; color:white; text-align:center;">Analisis</h2>
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