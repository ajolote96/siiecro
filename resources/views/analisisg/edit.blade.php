@extends('adminlte::layouts.app')
 <?php
  $analisisg = $analisisgs->first();
$contador_soporte = 0;
$contador_base = 0;
$contador_otros = 0;
$contador_biodeterioro = 0;
$contador_matag = 0;
$contador_sales = 0;
$contador_maso = 0;
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
                                <th bgcolor="">Número de muestra</th>
                                <th style="background-color: #C65911; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #C65911; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #C65911; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #C65911; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #C65911; color:white; width:300px">Responsable</th>
                                <th style="background-color: #C65911; color:white; width:300px">No. de indentificacion</th>
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



            
            
            <!--BASE MUESTRA II-->
               @foreach($baseP as $basesP)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" background-color: red;><strong>BASE DE PREPARACIóN</strong> 
                        <thead>
                            <tr align="center">
                                <th bgcolor="">Número de muestra</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Responsable</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">No. de indentificacion</th>
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
                
                <!--MATERIALES ASOCIADOS X-->
                @foreach($maso as $materialaso)
                <div class="input-group" id="tabmaso" >
                    <table class="table table-bordered" background-color: red;><strong>MATERIAL ASOCIADO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #8686C4; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Responsable</th>
                                <th style="background-color: #8686C4; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="MASOmuestra_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_muestra}}"></td>
                                <td><input type="text" name="MASOnomenclatura_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_nomenclatura}}"></td>
                                <td><input type="text" name="MASOinf_requerida_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_inf_requerida}}"></td>
                                <td><input type="text" name="MASOdes_muestra_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_des_muestra}}"></td>
                                <td><input type="text" name="MASOubicacion_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_ubicacion}}"></td>
                                <td><input type="text" name="MASOresponsable_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_responsable}}"></td>
                                <td><input type="text" name="MASOiden_muestra_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_maso +=1;
                  ?>
               @endforeach
               @if($maso->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otromaso" name="otromaso" class="btn-sm"  value="Agregar más" onclick="javascript:masmaso()">
                </div>
                <div id="inputmaso"></div><br>
                @endif

<<<<<<< HEAD
                 <!--SALES XI-->
                 @foreach($sal as $sales)
=======
<<<<<<< HEAD
             
             
=======
                @foreach($revoque as $revoques)
>>>>>>> e05399477cbb0b09534da7ad6cb31ea848dbff2c
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" background-color: red;><strong>SALES</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #009999; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #009999; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #009999; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #009999; color:white; width:300px">Responsable</th>
                                <th style="background-color: #009999; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="SALmuestra_edit{{$contador_sales}}" value="{{ $sales->sales_muestra}}"></td>
                                <td><input type="text" name="SALnomenclatura_edit{{$contador_sales}}" value="{{ $sales->sales_nomenclatura}}"></td>
                                <td><input type="text" name="SALinf_requerida_edit{{$contador_sales}}" value="{{ $sales->sales_inf_requerida}}"></td>
                                <td><input type="text" name="SALdes_muestra_edit{{$contador_sales}}" value="{{ $sales->sales_des_muestra}}"></td>
                                <td><input type="text" name="SALubicacion_edit{{$contador_sales}}" value="{{ $sales->sales_ubicacion}}"></td>
                                <td><input type="text" name="SALresponsable_edit{{$contador_sales}}" value="{{ $sales->sales_responsable}}"></td>
                                <td><input type="text" name="SALiden_muestra_edit{{$contador_sales}}" value="{{ $sales->sales_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_sales +=1;
                  ?>
               @endforeach
               @if($sal->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrosales" name="otrosales" class="btn-sm"  value="Agregar más" onclick="javascript:massales()">
                </div>
                <div id="inputsales"></div><br>
                @endif


                <!--MATERIAL AGREGADO XII-->
                @foreach($materialag as $matag)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" background-color: red;><strong>MATERIAL AGREGADO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #7D10C0; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Responsable</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="MAGmuestra_edit{{$contador_matag}}" value="{{ $matag->materialag_muestra}}"></td>
                                <td><input type="text" name="MAGnomenclatura_edit{{$contador_matag}}" value="{{ $matag->materialag_nomenclatura}}"></td>
                                <td><input type="text" name="MAGinf_requerida_edit{{$contador_matag}}" value="{{ $matag->materialag_inf_requerida}}"></td>
                                <td><input type="text" name="MAGdes_muestra_edit{{$contador_matag}}" value="{{ $matag->materialag_des_muestra}}"></td>
                                <td><input type="text" name="MAGubicacion_edit{{$contador_matag}}" value="{{ $matag->materialag_ubicacion}}"></td>
                                <td><input type="text" name="MAGresponsable_edit{{$contador_matag}}" value="{{ $matag->materialag_responsable}}"></td>
                                <td><input type="text" name="MAGiden_muestra_edit{{$contador_matag}}" value="{{ $matag->materialag_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_matag +=1;
                  ?>
               @endforeach
               @if($materialag->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otromatag" name="otromatag" class="btn-sm"  value="Agregar más" onclick="javascript:masmatag()">
                </div>
                <div id="inputmatag"></div><br>
                @endif


            <!--BIODETERIORO MUESTRA XIII-->
                @foreach($biodeterioro as $biodeterioros)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" background-color: red;><strong>BIODETERIORO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A2C866; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Responsable</th>
                                <th style="background-color: #A2C866; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="BDTmuestra_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_muestra}}"></td>
                                <td><input type="text" name="BDTnomenclatura_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_nomenclatura}}"></td>
                                <td><input type="text" name="BDTinf_requerida_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_inf_requerida}}"></td>
                                <td><input type="text" name="BDTdes_muestra_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_des_muestra}}"></td>
                                <td><input type="text" name="BDTubicacion_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_ubicacion}}"></td>
                                <td><input type="text" name="BDTresponsable_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_responsable}}"></td>
                                <td><input type="text" name="BDTiden_muestra_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_biodeterioro +=1;
                  ?>
               @endforeach
               @if($biodeterioro->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrobiodeterioro" name="otrobiodeterioro" class="btn-sm"  value="Agregar más" onclick="javascript:masbiodeterioro()">
                </div>
                <div id="inputbiodeterioro"></div><br>
                @endif





                <!--OTROS MUESTRA XIV-->
                @foreach($otros as $otro)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" background-color: red;><strong>OTROS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A5A5A5; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Responsable</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="OTmuestra_edit{{$contador_otros}}" value="{{ $otro->otros_muestra}}"></td>
                                <td><input type="text" name="OTnomenclatura_edit{{$contador_otros}}" value="{{ $otro->otros_nomenclatura}}"></td>
                                <td><input type="text" name="OTinf_requerida_edit{{$contador_otros}}" value="{{ $otro->otros_inf_requerida}}"></td>
                                <td><input type="text" name="OTdes_muestra_edit{{$contador_otros}}" value="{{ $otro->otros_des_muestra}}"></td>
                                <td><input type="text" name="OTubicacion_edit{{$contador_otros}}" value="{{ $otro->otros_ubicacion}}"></td>
                                <td><input type="text" name="OTresponsable_edit{{$contador_otros}}" value="{{ $otro->otros_responsable}}"></td>
                                <td><input type="text" name="OTiden_muestra_edit{{$contador_otros}}" value="{{ $otro->otros_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_otros +=1;
                ?>  
               @endforeach
               @if($otros->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrootros" name="otrootros" class="btn-sm"  value="Agregar más" onclick="javascript:masotros()">
                </div>
                <div id="inputotros"></div><br>
                @endif
               


               <div align="center">
              
                </div>
<<<<<<< HEAD
               
=======
                <div id="inputrecubrimiento"></div><br>
                @endif
>>>>>>> 4432738266f26bede9981349eb9e70e1bde6b423
>>>>>>> e05399477cbb0b09534da7ad6cb31ea848dbff2c
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                            <a href="{{route('analisisg.index')}}" class="btn btn-danger btn-sm">Cancelar</a>
                    </div>
                </form>
        </div>
	</div>
</div>
@endsection