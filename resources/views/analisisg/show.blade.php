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
    <div class="box-body"  >
            <div class="panel">
                <h1>Solicitud de Análisis Científico: {{ $analisisg->id_general }}</h1>
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
                            
<<<<<<< HEAD
                            <div class="input-group" >
                                <label for="id_de_obra" class="input-group-addon">ID Obra </label>
                                <input type="text" name="id_de_obra" class="form-control"  value="{{ $analisisg->id_de_obra }}" style="width:200px" readonly><BR>    
                            </div>
                            <div class="input-group" >
                                <label for="titulo_obra" class="input-group-addon">Titulo de la obra/pieza</label>
                                <input type="text" name="titulo_obra" class="form-control"  value="{{ $analisisg->titulo_obra }}" style="width:200px" readonly><BR> 
                            </div>
							<div class="form-group">
							<div class="input-group">
                                <span class="input-group-addon">Temporalidad</span>
                                <input type="text" name="temp_obra" class="form-control"  value="{{ $analisisg->temp_obra }}" style="width:200px" readonly>
                            </div>
                        	</div><br><br>
                        
                            <div class="input-group ">
                                <label for="epoca_obra" class="input-group-addon">Epoca de la obra</label>
                                <input type="text" name="epoca_obra" class="form-control"  value="{{ $analisisg->epoca_obra }}" style="width:200px" readonly>
                            </div>
                            
                            <div class="input-group">
                                <label for="tipo_obj_obra" class="input-group-addon">Tipo de objeto de la obra</label>
                                <input type="text" name="tipo_obj_obra" class="form-control"  value="{{$analisisg->tipo_obj_obra }}" style="width:200px" readonly>
                            </div>
                        </div><br><br>
                        
                        </div><br><br>
=======
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
                        	 
>>>>>>> e05399477cbb0b09534da7ad6cb31ea848dbff2c
                        
                            <tr>
                              <td>  <label for="epoca_obra" class="input-group-addon"style="width: 300px; border:0;">Epoca de la obra</label></td>
                              <td>  <input type="text" name="epoca_obra" class="form-control"  value="{{ $analisisg->epoca_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                          
                            
                            <tr>
                              <td>  <label for="tipo_obj_obra" class="input-group-addon"style="width: 300px; border:0;">Tipo de objeto de la obra</label></td>
                               <td> <input type="text" name="tipo_obj_obra" class="form-control"  value="{{$analisisg->tipo_obj_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>



                         
                    
                   
                    
<<<<<<< HEAD
                    <div class="input-group">
                        <label for="respon_intervencion" class="input-group-addon">Responsable de la Intervencion</label>
                        <input type="text" class="form-control"  name="respon_intervencion"  value="{{ $analisisg->respon_intervencion }}" style="width:200px">
                    </div>
=======
                       <tr>
                        <td><label for="respon_intervencion" class="input-group-addon"style="width: 300px; border:0;">Responsable de la Intervencion</label></td>
                        <td><input type="text" class="form-control"  name="respon_intervencion"  value="{{ $analisisg->respon_intervencion }}" style="width:500px; text-align:center;"></td>
                      </tr>
>>>>>>> e05399477cbb0b09534da7ad6cb31ea848dbff2c
                    
                  
                      
<<<<<<< HEAD
                    <br><br>
                    <div class="input-group">
                    <div class="input-group date">
                        <div class="input-group-addon">
                             <i class="fa fa-calendar"> Fecha de entrada</i>

                        </div>

                        <input type="date" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $analisisg->fecha_de_inicio }}" style="width:262px">
                    </div>
=======
                    
                   
                    
                        <tr>
                            <td> <i class="fa fa-calendar"style="width: 300px; border:0;"> Fecha de entrada</i></td>
                           <td><input type="date" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $analisisg->fecha_de_inicio }}" style="width:500px"></td>
                        </tr>
>>>>>>> e05399477cbb0b09534da7ad6cb31ea848dbff2c
                
                    
                     
                       
                    
<<<<<<< HEAD
                    <div class="input-group">
                        <label for="tecnica" class="input-group-addon">Tecnica</label>
                        <input type="text" class="form-control"  name="tecnica" value="{{ $analisisg->tecnica}}" style="width:200px">
                    </div><br><br>
                    <div class="col-md-12"></div>

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
=======
                    
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
>>>>>>> e05399477cbb0b09534da7ad6cb31ea848dbff2c
                        

                    
                <div class="col-md-12"></div>

                    
                    
                </div><br><br>
               
               <!--TABLA SOPORTE MUESTRA I-->
                @foreach($soportes as $soporte)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" background-color: red;><strong>SOPORTE</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #C65911; color:white; width:300px">Número de muestra</th>
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

                <!--TABLA BASE MUESTRA II -->
               @foreach($baseP as $bases)
               <div class="input-group" id="tabbase" >
                    <table class="table table-bordered"><strong>BASE DE PREPARACION</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FFCC66; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Responsable</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">No. de indentificacion</th>
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

                <!--MATERIAL ASOCIADO X -->
                @foreach($maso as $materialaso)
               <div class="input-group" id="tabmaterialaso" >
                    <table class="table table-bordered"><strong>X MATERIAL ASOCIADO </strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #009999; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #009999; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #009999; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #009999; color:white; width:300px">Responsable</th>
                                <th style="background-color: #009999; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="MASOmuestra" value="{{ $materialaso->materialaso_muestra}}"></td>
                                <td><input type="text" name="MASOnomenclatura" value="{{ $materialaso->materialaso_nomenclatura}}"></td>
                                <td><input type="text" name="MASOinf_requerida" value="{{ $materialaso->materialaso_inf_requerida}}"></td>
                                <td><input type="text" name="MASOdes_muestra" value="{{ $materialaso->materialaso_des_muestra}}"></td>
                                <td><input type="text" name="MASOubicacion" value="{{ $materialaso->materialaso_ubicacion}}"></td>
                                <td><input type="text" name="MASOresponsable" value="{{ $materialaso->materialaso_responsable}}"></td>
                                <td><input type="text" name="MASOiden_muestra" value="{{ $materialaso->materialaso_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach


                <!--SALES XI -->
                @foreach($sal as $sales)
               <div class="input-group" id="tabsales" >
                    <table class="table table-bordered"><strong>XI SALES </strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #009999; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #009999; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #009999; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #009999; color:white; width:300px">Responsable</th>
                                <th style="background-color: #009999; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="SALmuestra" value="{{ $sales->sales_muestra}}"></td>
                                <td><input type="text" name="SALnomenclatura" value="{{ $sales->sales_nomenclatura}}"></td>
                                <td><input type="text" name="SALinf_requerida" value="{{ $sales->sales_inf_requerida}}"></td>
                                <td><input type="text" name="SALdes_muestra" value="{{ $sales->sales_des_muestra}}"></td>
                                <td><input type="text" name="SALubicacion" value="{{ $sales->sales_ubicacion}}"></td>
                                <td><input type="text" name="SALresponsable" value="{{ $sales->sales_responsable}}"></td>
                                <td><input type="text" name="SALiden_muestra" value="{{ $sales->sales_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach


                
                <!--MATERIAL AGREGADO XII -->
                @foreach($materialag as $matag)
               <div class="input-group" id="tabmaterialag" >
                    <table class="table table-bordered"><strong>XIII MATERIAL AGREGADO </strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #7D10C0; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Responsable</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="MAGmuestra" value="{{ $matag->materialag_muestra}}"></td>
                                <td><input type="text" name="MAGnomenclatura" value="{{ $matag->materialag_nomenclatura}}"></td>
                                <td><input type="text" name="MAGinf_requerida" value="{{ $matag->materialag_inf_requerida}}"></td>
                                <td><input type="text" name="MAGdes_muestra" value="{{ $matag->materialag_des_muestra}}"></td>
                                <td><input type="text" name="MAGubicacion" value="{{ $matag->materialag_ubicacion}}"></td>
                                <td><input type="text" name="MAGresponsable" value="{{ $matag->materialag_responsable}}"></td>
                                <td><input type="text" name="MAGiden_muestra" value="{{ $matag->materialag_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach



                <!--TABLA BIODETERIORO XIII -->
                @foreach($biodeterioro as $biodeterioros)
               <div class="input-group" id="tabbiodeterioro" >
                    <table class="table table-bordered"><strong>XIII BIODETERIORO </strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A2C866; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Responsable</th>
                                <th style="background-color: #A2C866; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="BDTmuestra" value="{{ $biodeterioros->biodeterioro_muestra}}"></td>
                                <td><input type="text" name="BDTnomenclatura" value="{{ $biodeterioros->biodeterioro_nomenclatura}}"></td>
                                <td><input type="text" name="BDTinf_requerida" value="{{ $biodeterioros->biodeterioro_inf_requerida}}"></td>
                                <td><input type="text" name="BDTdes_muestra" value="{{ $biodeterioros->biodeterioro_des_muestra}}"></td>
                                <td><input type="text" name="BDTubicacion" value="{{ $biodeterioros->biodeterioro_ubicacion}}"></td>
                                <td><input type="text" name="BDTresponsable" value="{{ $biodeterioros->biodeterioro_responsable}}"></td>
                                <td><input type="text" name="BDTiden_muestra" value="{{ $biodeterioros->biodeterioro_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach





                <!--TABLA OTROS XIV -->
                @foreach($otros as $otro)
               <div class="input-group" id="tabbase" >
                    <table class="table table-bordered"><strong>OTROS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Número de muestra</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Nomenclatura</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Información requerida</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Descripcion de la muestra</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Ubicación</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Responsable</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px" >No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="OTmuestra" value="{{ $otro->otros_muestra}}"></td>
                                <td><input type="text" name="OTnomenclatura" value="{{ $otro->otros_nomenclatura}}"></td>
                                <td><input type="text" name="OTinf_requerida" value="{{ $otro->otros_inf_requerida}}"></td>
                                <td><input type="text" name="OTdes_muestra" value="{{ $otro->otros_des_muestra}}"></td>
                                <td><input type="text" name="OTubicacion" value="{{ $otro->otros_ubicacion}}"></td>
                                <td><input type="text" name="OTresponsable" value="{{ $otro->otros_responsable}}"></td>
                                <td><input type="text" name="OTiden_muestra" value="{{ $otro->otros_identificacion_muestra}}"></td>
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
                    </div>
                </form>
        </div>
	</div>
</div>
@endsection