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
                    <div class="form-group">
                        <div class="form-group">
                            
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
                        
                    	<div class="form-group">
                    
                   
                    
                    <div class="input-group">
                        <label for="respon_intervencion" class="input-group-addon">Responsable de la Intervencion</label>
                        <input type="text" class="form-control"  name="respon_intervencion"  value="{{ $analisisg->respon_intervencion }}" style="width:200px">
                    </div>
                    
                </div><br><br>
                      
                    <br><br>
                    <div class="input-group">
                    <div class="input-group date">
                        <div class="input-group-addon">
                             <i class="fa fa-calendar"> Fecha de entrada</i>

                        </div>

                        <input type="date" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $analisisg->fecha_de_inicio }}" style="width:262px">
                    </div>
                
                    
                    </div>
                    </div><br><br>
                    <div class="form-group">
                    
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
                        
                    </div><br><br>
                    
                    
                </div><br><br>
                <!--<table class="table table-bordered"><b>ANALISIS</b><br>
                    <thead>
                        <tr>
                            <th><label><input type="checkbox" name="tsoporte" id="tsoporte" onchange="javascript:showSoporte()"> SOPORTE</label><br></th>
                            <th><label><input type="checkbox" name="tbase" id="tbase" onchange="javascript:showBase()"> BASE DE PREPAPRACION</label><br></th>
                            <th><label><input type="checkbox" name="testra" id="testra" onchange="javascript:showEstra()"> ESTRATIGRAFIA</label></th>
                            <th><label><input type="checkbox" name="trevo" id="trevo" onchange="javascript:showRevo()"> REVOQUE Y ELUCIDO</label></th>
                            <th><label><input type="checkbox" name="tbol" id="tbol" onchange="javascript:showBol()"> BOL</label></th>
                            <th><label><input type="checkbox" name="tlame" id="tlami" onchange="javascript:showLami()"> LAMINAS METALICAS</label></th>
                            <th><label><input type="checkbox" name="tpig" id="tpig" onchange="javascript:showPig()"> PIGMENTOS</label></th>
                            
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td><label><input type="checkbox" name="taglu" id="taglu" onchange="javascript:showAglu()"> AGLUTINANTE</label></td>
                                <td><label><input type="checkbox" name="trecu" id="trecu" onchange="javascript:showRecu()"> RECUBRIMIENTO</label></td>
                                <td><label><input type="checkbox" name="tmaso" id="tmaso" onchange="javascript:showMaso()"> MATERIAL ASOCIADO</label></td>
                                <td><label><input type="checkbox" name="tsal" id="tsal" onchange="javascript:showSal()"> SALES</label></td>
                                <td><label><input type="checkbox" name="tmagre" id="tmagre" onchange="javascript:showMagre()"> MATERIAL AGREGADO</label></td>
                                <td><label><input type="checkbox" name="tbio" id="tbio" onchange="javascript:showBio()"> BIODETERIORO</label></td>
                                <td><label><input type="checkbox" name="totro" id="totro" onchange="javascript:showOtro()"> OTROS</label></td>
                                </tr>
                        </tbody>
                </table>
                <br><br>   --> 

                @foreach($analisisgs as $soporte)

                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" background-color: red;><strong>SOPORTE</strong> 
                        <thead>
                            <tr align="center">
                                <th bgcolor="">Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
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