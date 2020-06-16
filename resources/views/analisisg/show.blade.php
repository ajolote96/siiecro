@extends('adminlte::layouts.app')
 
@section('main-content')

<!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>{{ $Obrasg->first()->id }}
@endif-->




<?php
          $analisisg = $analisisgs->first();

          ?>

<div class="box">
    <div class="box-body">
            <div class="panel">
                <h1 style="background-color: grey; color:white; text-align:center;">Solicitud de Análisis Científico: {{ $analisisg->id_general }}</h1>
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
                    @csrf 

                    <BR>
                    <div align="center">
                        <table>
                            
                            <tr >
                               <td> <label for="id_de_obra" class="input-group-addon" style="width: 300px; border:0;">ID Obra </label></td>
                               <td> <input type="text" name="id_de_obra" class="form-control"  value="{{ $analisisg->id_de_obra }}" style="width:500px; text-align:center;"  readonly></td>    
                            </tr>
                           
                            <tr >
                               <td> <label for="titulo_obra" class="input-group-addon" style="width: 300px; border:0;">Titulo de la obra/pieza</label></td>
                               <td> <input type="text" name="titulo_obra" class="form-control"  value="{{ $analisisg->titulo_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            
							 
							<tr>
                               <td> <span class="input-group-addon"style="width: 300px; border:0;">Temporalidad</span></td>
                               <td> <input type="text" name="temp_obra" class="form-control"  value="{{ $analisisg->temp_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                        	 
                        
                            <tr>
                              <td>  <label for="epoca_obra" class="input-group-addon"style="width: 300px; border:0;">Epoca de la obra</label></td>
                              <td>  <input type="text" name="epoca_obra" class="form-control"  value="{{ $analisisg->epoca_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                          
                            
                            <tr>
                              <td>  <label for="tipo_obj_obra" class="input-group-addon"style="width: 300px; border:0;">Tipo de objeto de la obra</label></td>
                               <td> <input type="text" name="tipo_obj_obra" class="form-control"  value="{{$analisisg->tipo_obj_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>



                         
                    
                   
                    
                       <tr>
                        <td><label for="respon_intervencion" class="input-group-addon"style="width: 300px; border:0;">Responsable de la Intervencion</label></td>
                        <td><input type="text" class="form-control"  name="respon_intervencion"  value="{{ $analisisg->respon_intervencion }}" style="width:500px; text-align:center;"></td>
                      </tr>
                    
                  
                      
                    
                   
                    
                        <tr>
                            <td> <i class="fa fa-calendar"style="width: 300px; border:0;"> Fecha de entrada</i></td>
                           <td><input type="date" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $analisisg->fecha_de_inicio }}" style="width:500px"></td>
                        </tr>
                
                    
                     
                       
                    
                    
                     <tr>
                       <td> <label for="tecnica" class="input-group-addon"style="width: 300px; border:0;">Tecnica</label></td>
                        <td><input type="text" class="form-control"  name="tecnica" value="{{ $analisisg->tecnica}}" style="width:500px; text-align:center;"></td>
                     </tr>




                           </table>
                        

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








</div>  <!--aca termina-->







      
                         

      </div> <!-- por aca termina la tabla-->
                        

                    
                <div class="col-md-12"></div>

                    
                    
                </div><br><br>
                

                @foreach($soportes as $soporte)

                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" ><strong>SOPORTE</strong> 
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
                                <td><input type="text" name="Smuestra" value="{{ $soporte->soporte_muestra}}"></td>
                                <td><input type="text" name="Snomenclatura" value="{{ $soporte->soporte_nomenclatura}}"></td>
                                <td><input type="text" name="Sinf_requerida" value="{{ $soporte->soporte_inf_requerida}}"></td>
                                <td><input type="text" name="Sdes_muestra" value="{{ $soporte->soporte_des_muestra}}"></td>
                                <td><input type="text" name="Subicacion" value="{{ $soporte->soporte_ubicacion}}"></td>
                                <td><input type="text" name="Sresponsable" value="{{ $soporte->soporte_responsable}}"></td>
                                <td><input type="text" name="Siden_muestra" value="{{ $soporte->soporte_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach

               @foreach($baseP as $bases)
               <div class="input-group" id="tabbase" >
                    <table class="table table-bordered"><strong>BASE DE PREPARACIÓN</strong> 
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
                                <td><input type="text" name="BPmuestra" value="{{ $bases->base_muestra}}"></td>
                                <td><input type="text" name="BPnomenclatura" value="{{ $bases->base_nomenclatura}}"></td>
                                <td><input type="text" name="BPinf_requerida" value="{{ $bases->base_inf_requerida}}"></td>
                                <td><input type="text" name="BPdes_muestra" value="{{ $bases->base_des_muestra}}"></td>
                                <td><input type="text" name="BPubicacion" value="{{ $bases->base_ubicacion}}"></td>
                                <td><input type="text" name="BPresponsable" value="{{ $bases->base_responsable}}"></td>
                                <td><input type="text" name="BPiden_muestra" value="{{ $bases->base_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach

                @foreach($estratigrafia as $estratigrafias)
               <div class="input-group" id="tabbase" >
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
                                <td><input type="text" name="Emuestra" value="{{ $estratigrafias->estratigrafia_muestra}}"></td>
                                <td><input type="text" name="Enomenclatura" value="{{ $estratigrafias->estratigrafia_nomenclatura}}"></td>
                                <td><input type="text" name="Einf_requerida" value="{{ $estratigrafias->estratigrafia_inf_requerida}}"></td>
                                <td><input type="text" name="Edes_muestra" value="{{ $estratigrafias->estratigrafia_des_muestra}}"></td>
                                <td><input type="text" name="Eubicacion" value="{{ $estratigrafias->estratigrafia_ubicacion}}"></td>
                                <td><input type="text" name="Eresponsable" value="{{ $estratigrafias->estratigrafia_responsable}}"></td>
                                <td><input type="text" name="Eiden_muestra" value="{{ $estratigrafias->estratigrafia_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach                
                
                <div class="" align="center">
                        <label for="foto" class="">Foto:</label>
                        
                    </div>
                <div class="" align="center">
                    @if($analisisg->foto == 'Sin imagen')
                        <input type="text" class="form-control"  name="respon_intervencion" border="0" value="Sin imagen" style="width:200px">
                        @else
                        <a align="center" target="_blank" href="http://127.0.0.1:8000/images/{{$analisisg->foto}} "><img  width="600px" src="{{asset('images/'.$analisisg->foto)}}" class=""></a>
                        @endif
                </div><br><br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <a href="{{route('analisisg.index')}}" class="btn btn-danger btn-sm">Regresar</a>
                     
                </form>
        </div>
	</div>
</div>
@endsection