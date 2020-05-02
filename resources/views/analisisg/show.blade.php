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
                            <div class="input-group ">
                                <label for="tipo_bien_cultu" class="input-group-addon">Tipo de bien cultural</label>
                                <input type="text" name="tipo_bien_cultu" class="form-control"  value="{{ $analisisg->tipo_bien_cultu }}" style="width:200px" readonly>
                            </div>
                            <div class="input-group">
                                <label for="tipo_obj_obra" class="input-group-addon">Tipo de objeto de la obra</label>
                                <input type="text" name="tipo_obj_obra" class="form-control"  value="{{$analisisg->tipo_obj_obra }}" style="width:200px" readonly>
                            </div>
                        </div><br><br>
                        <div class="form-group">                            
                            <div class="input-group">
                                <label for="lugar_proce_ori" class="input-group-addon">Lugar de procedencia original</label>
                                <input type="text" class="form-control"  name="lugar_proce_ori"  value="{{ $analisisg->lugar_proce_ori }}" style="width:200px"readonly>
                            </div>
                            <div class="input-group">
                                <label for="lugar_proce_act" class="input-group-addon">Lugar de procedencia actual</label>
                                <input type="text" class="form-control"  name="lugar_proce_act"  value="{{ $analisisg->lugar_proce_act }}" style="width:200px" readonly>
                            </div>
                            <div class="input-group">
                        	<label for="no_inv_obra" class="input-group-addon">Numero de inventario de la obra</label>
                        	<input type="text" class="form-control"  name="no_inv_obra"  value="{{ $analisisg->no_inv_obra }}" style="width:200px" readonly>
                    	</div>
                        </div><br><br>
                        
                    	<div class="form-group">
                    
                    <div class="input-group">
                        <label for="proyecto_obra" class="input-group-addon">Proyecto de la obra</label>
                        <input type="text" class="form-control"  name="proyecto_obra"  value="{{ $analisisg->proyecto_obra }}" style="width:200px" readonly>
                    </div>
                    <div class="input-group">
                        <label for="año_proyec_obra" class="input-group-addon">Año de proyecto de la obra</label>
                        <input type="text" class="form-control"  name="año_proyec_obra" value="{{$analisisg->año_proyec_obra }}" style="width:200px" readonly>
                    </div>
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

                        <input type="date" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $analisisg->fecha_inicio }}" style="width:262px">
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
                @if($analisisg->Smuestra != null)          
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" background-color: red;><strong>SOPORTE</strong> 
                        <thead>
                            <tr align="center">
                                <th bgcolor="">Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="Smuestra" value="{{ $analisisg->Smuestra}}"></td>
                                <td><input type="text" name="Snomenclatura" value="{{ $analisisg->Snomenclatura}}"></td>
                                <td><input type="text" name="Sinf_requerida" value="{{ $analisisg->Sinf_requerida}}"></td>
                                <td><input type="text" name="Sdes_muestra" value="{{ $analisisg->Sdes_muestra}}"></td>
                                <td><input type="text" name="Subicacion" value="{{ $analisisg->Subicacion}}"></td>
                                <td><input type="text" name="Smotivo" value="{{ $analisisg->Smotivo}}"></td>
                                <td><input type="text" name="Sresponsable" value="{{ $analisisg->Sresponsable}}"></td>
                                <td><input type="text" name="Siden_muestra" value="{{ $analisisg->Siden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                @if($analisisg->BPmuestra != null)
                <div class="input-group" id="tabbase" >
                    <table class="table table-bordered"><strong>BASE DE PREPARACION</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="BPmuestra" value="{{ $analisisg->BPmuestra}}"></td>
                                <td><input type="text" name="BPnomenclatura" value="{{ $analisisg->BPnomenclatura}}"></td>
                                <td><input type="text" name="BPinf_requerida" value="{{ $analisisg->BPinf_requerida}}"></td>
                                <td><input type="text" name="BPdes_muestra" value="{{ $analisisg->BPdes_muestra}}"></td>
                                <td><input type="text" name="BPubicacion" value="{{ $analisisg->BPubicacion}}"></td>
                                <td><input type="text" name="BPmotivo" value="{{ $analisisg->BPmotivo}}"></td>
                                <td><input type="text" name="BPresponsable" value="{{ $analisisg->BPresponsable}}"></td>
                                <td><input type="text" name="BPiden_muestra" value="{{ $analisisg->BPiden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                @if($analisisg->Emuestra != null)
                <div class="input-group" id="tabestra" >
                    <table class="table table-bordered"><strong>ESTRATIGRAFIA</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="Emuestra" value="{{ $analisisg->Emuestra}}"></td>
                                <td><input type="text" name="Enomenclatura" value="{{ $analisisg->Enomenclatura}}"></td>
                                <td><input type="text" name="Einf_requerida" value="{{ $analisisg->Einf_requerida}}"></td>
                                <td><input type="text" name="Edes_muestra" value="{{ $analisisg->Edes_muestra}}"></td>
                                <td><input type="text" name="Eubicacion" value="{{ $analisisg->Eubicacion}}"></td>
                                <td><input type="text" name="Emotivo" value="{{ $analisisg->Emotivo}}"></td>
                                <td><input type="text" name="Eresponsable" value="{{ $analisisg->Eresponsable}}"></td>
                                <td><input type="text" name="Eiden_muestra" value="{{ $analisisg->Eiden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                 @endif
                @if($analisisg->REmuestra != null)
                <div class="input-group" id="tabrevo" >
                    <table class="table table-bordered"><strong>REVOQUE Y ENLUCIDO</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="REmuestra" value="{{ $analisisg->REmuestra}}"></td>
                                <td><input type="text" name="REnomenclatura" value="{{ $analisisg->REmuestra}}"></td>
                                <td><input type="text" name="REinf_requerida" value="{{ $analisisg->REinf_requerida}}"></td>
                                <td><input type="text" name="REdes_muestra" value="{{ $analisisg->REdes_muestra}}"></td>
                                <td><input type="text" name="REubicacion" value="{{ $analisisg->REubicacion}}"></td>
                                <td><input type="text" name="REmotivo" value="{{ $analisisg->REmotivo}}"></td>
                                <td><input type="text" name="REresponsable" value="{{ $analisisg->REresponsable}}"></td>
                                <td><input type="text" name="REiden_muestra" value="{{ $analisisg->REiden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                 @endif
                @if($analisisg->BOLmuestra != null)
                <div class="input-group" id="tabbol" >
                    <table class="table table-bordered"><strong>BOL</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="BOLmuestra" value="{{ $analisisg->BOLmuestra}}"></td>
                                <td><input type="text" name="BOLnomenclatura" value="{{ $analisisg->BOLnomenclatura}}"></td>
                                <td><input type="text" name="BOLinf_requerida" value="{{ $analisisg->BOLinf_requerida}}"></td>
                                <td><input type="text" name="BOLdes_muestra" value="{{ $analisisg->BOLdes_muestra}}"></td>
                                <td><input type="text" name="BOLubicacion" value="{{ $analisisg->BOLubicacion}}"></td>
                                <td><input type="text" name="BOLmotivo" value="{{ $analisisg->BOLmotivo}}"></td>
                                <td><input type="text" name="BOLresponsable" value="{{ $analisisg->BOLresponsable}}"></td>
                                <td><input type="text" name="BOLiden_muestra" value="{{ $analisisg->BOLiden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                @endif
                @if($analisisg->LMmuestra != null)
                <div class="input-group" id="tablami" >
                    <table class="table table-bordered"><strong>LAMINAS METALICAS</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="LMmuestra" value="{{ $analisisg->LMmuestra}}"></td>
                                <td><input type="text" name="LMnomenclatura" value="{{ $analisisg->LMnomenclatura}}"></td>
                                <td><input type="text" name="LMinf_requerida" value="{{ $analisisg->LMinf_requerida}}"></td>
                                <td><input type="text" name="LMdes_muestra" value="{{ $analisisg->LMdes_muestra}}"></td>
                                <td><input type="text" name="LMubicacion" value="{{ $analisisg->LMubicacion}}"></td>
                                <td><input type="text" name="LMmotivo" value="{{ $analisisg->LMmotivo}}"></td>
                                <td><input type="text" name="LMresponsable" value="{{ $analisisg->LMresponsable}}"></td>
                                <td><input type="text" name="LMiden_muestra" value="{{ $analisisg->LMiden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                 @endif
                @if($analisisg->Pmuestra != null)
                <div class="input-group" id="tabpig" >
                    <table class="table table-bordered"><strong>PIGMENTOS</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="Pmuestra" value="{{ $analisisg->Pmuestra}}"></td>
                                <td><input type="text" name="Pnomenclatura" value="{{ $analisisg->Pnomenclatura}}"></td>
                                <td><input type="text" name="Pinf_requerida" value="{{ $analisisg->Pinf_requerida}}"></td>
                                <td><input type="text" name="Pdes_muestra" value="{{ $analisisg->Pdes_muestra}}"></td>
                                <td><input type="text" name="Pubicacion" value="{{ $analisisg->Pubicacion}}"></td>
                                <td><input type="text" name="Pmotivo" value="{{ $analisisg->Pmotivo}}"></td>
                                <td><input type="text" name="Presponsable" value="{{ $analisisg->Presponsable}}"></td>
                                <td><input type="text" name="Piden_muestra" value="{{ $analisisg->Piden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                 @endif
                @if($analisisg->Ämuestra != null)
                <div class="input-group" id="tabaglu">
                    <table class="table table-bordered"><strong>AGLUTINANTE</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="Amuestra" value="{{ $analisisg->Amuestra}}"></td>
                                <td><input type="text" name="Anomenclatura" value="{{ $analisisg->Anomenclatura}}"></td>
                                <td><input type="text" name="Ainf_requerida" value="{{ $analisisg->Ainf_requerida}}"></td>
                                <td><input type="text" name="Ades_muestra" value="{{ $analisisg->Ades_muestra}}"></td>
                                <td><input type="text" name="Aubicacion" value="{{ $analisisg->Aubicacion}}"></td>
                                <td><input type="text" name="Amotivo" value="{{ $analisisg->Amotivo}}"></td>
                                <td><input type="text" name="Aresponsable" value="{{ $analisisg->Aresponsable}}"></td>
                                <td><input type="text" name="Aiden_muestra" value="{{ $analisisg->Aiden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                @endif
                @if($analisisg->Rmuestra != null)
                <div class="input-group" id="tabrecu" >
                    <table class="table table-bordered"><strong>RECUBRIMIENTO</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="Rmuestra" value="{{ $analisisg->Rmuestra}}"></td>
                                <td><input type="text" name="Rnomenclatura" value="{{ $analisisg->Rnomenclatura}}"></td>
                                <td><input type="text" name="Rinf_requerida" value="{{ $analisisg->Rinf_requerida}}"></td>
                                <td><input type="text" name="Rdes_muestra" value="{{ $analisisg->Rdes_muestra}}"></td>
                                <td><input type="text" name="Rubicacion" value="{{ $analisisg->Rubicacion}}"></td>
                                <td><input type="text" name="Rmotivo" value="{{ $analisisg->Rmotivo}}"></td>
                                <td><input type="text" name="Rresponsable" value="{{ $analisisg->Rresponsable}}"></td>
                                <td><input type="text" name="Riden_muestra" value="{{ $analisisg->Riden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                @if($analisisg->MASOmuestra != null)
                <div class="input-group" id="tabmaso">
                    <table class="table table-bordered"><strong>MATERIAL ASOCIADO</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="MASOmuestra" value="{{ $analisisg->MASOmuestra}}"></td>
                                <td><input type="text" name="MASOnomenclatura" value="{{ $analisisg->MASOnomenclatura}}"></td>
                                <td><input type="text" name="MASOinf_requerida" value="{{ $analisisg->MASOinf_requerida}}"></td>
                                <td><input type="text" name="MASOdes_muestra" value="{{ $analisisg->MASOdes_muestra}}"></td>
                                <td><input type="text" name="MASOubicacion" value="{{ $analisisg->MASOubicacion}}"></td>
                                <td><input type="text" name="MASOmotivo" value="{{ $analisisg->MASOmotivo}}"></td>
                                <td><input type="text" name="MASOresponsable" value="{{ $analisisg->MASOresponsable}}"></td>
                                <td><input type="text" name="MASOiden_muestra" value="{{ $analisisg->MASOiden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                @if($analisisg->SALmuestra != null)
                <div class="input-group" id="tabsal">
                    <table class="table table-bordered"><strong>SAL</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="SALmuestra" value="{{ $analisisg->SALmuestra}}"></td>
                                <td><input type="text" name="SALnomenclatura" value="{{ $analisisg->SALnomenclatura}}"></td>
                                <td><input type="text" name="SALinf_requerida" value="{{ $analisisg->SALinf_requerida}}"></td>
                                <td><input type="text" name="SALdes_muestra" value="{{ $analisisg->SALdes_muestra}}"></td>
                                <td><input type="text" name="SALubicacion" value="{{ $analisisg->SALubicacion}}"></td>
                                <td><input type="text" name="SALmotivo" value="{{ $analisisg->SALmotivo}}"></td>
                                <td><input type="text" name="SALresponsable" value="{{ $analisisg->SALresponsable}}"></td>
                                <td><input type="text" name="SALiden_muestra" value="{{ $analisisg->SALiden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                @if($analisisg->MAGREmuestra != null)
                <div class="input-group" id="tabmagre" >
                    <table class="table table-bordered"><strong>MATERIAL AGREGADO</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="MAGREmuestra" value="{{ $analisisg->MAGREmuestra}}"></td>
                                <td><input type="text" name="MAGREnomenclatura" value="{{ $analisisg->MAGREnomenclatura}}"></td>
                                <td><input type="text" name="MAGREinf_requerida" value="{{ $analisisg->MAGREinf_requerida}}"></td>
                                <td><input type="text" name="MAGREdes_muestra" value="{{ $analisisg->MAGREdes_muestra}}"></td>
                                <td><input type="text" name="MAGREubicacion" value="{{ $analisisg->MAGREubicacion}}"></td>
                                <td><input type="text" name="MAGREmotivo" value="{{ $analisisg->MAGREmotivo}}"></td>
                                <td><input type="text" name="MAGREresponsable" value="{{ $analisisg->MAGREresponsable}}"></td>
                                <td><input type="text" name="MAGREiden_muestra" value="{{ $analisisg->MAGREiden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                @if($analisisg->BIOmuestra != null)
                <div class="input-group" id="tabbio">
                    <table class="table table-bordered"><strong>BIOTERIORO</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="BIOmuestra" value="{{ $analisisg->BIOmuestra}}"></td>
                                <td><input type="text" name="BIOnomenclatura" value="{{ $analisisg->BIOnomenclatura}}"></td>
                                <td><input type="text" name="BIOinf_requerida" value="{{ $analisisg->BIOinf_requerida}}"></td>
                                <td><input type="text" name="BIOdes_muestra" value="{{ $analisisg->BIOdes_muestra}}"></td>
                                <td><input type="text" name="BIOubicacion" value="{{ $analisisg->BIOubicacion}}"></td>
                                <td><input type="text" name="BIOmotivo" value="{{ $analisisg->BIOmotivo}}"></td>
                                <td><input type="text" name="BIOresponsable" value="{{ $analisisg->BIOresponsable}}"></td>
                                <td><input type="text" name="BIOiden_muestra" value="{{ $analisisg->BIOiden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                @if($analisisg->OTROmuestra != null)
                <div class="input-group" id="tabotro">
                    <table class="table table-bordered"><strong>OTROS</strong> 
                        <thead>
                            <tr align="center">
                                <th>Número de muestra</th>
                                <th>Nomenclatura</th>
                                <th>Información requerida</th>
                                <th>Descripcion de la muestra</th>
                                <th>Ubicación</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                                <th>No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="OTROmuestra" value="{{ $analisisg->OTROmuestra}}"></td>
                                <td><input type="text" name="OTROnomenclatura" value="{{ $analisisg->OTROnomenclatura}}"></td>
                                <td><input type="text" name="OTROinf_requerida" value="{{ $analisisg->OTROinf_requerida}}"></td>
                                <td><input type="text" name="OTROdes_muestra" value="{{ $analisisg->OTROdes_muestra}}"></td>
                                <td><input type="text" name="OTROubicacion" value="{{ $analisisg->OTROubicacion}}"></td>
                                <td><input type="text" name="OTROmotivo" value="{{ $analisisg->OTROmotivo}}"></td>
                                <td><input type="text" name="OTROresponsable" value="{{ $analisisg->OTROresponsable}}"></td>
                                <td><input type="text" name="OTROiden_muestra" value="{{ $analisisg->OTROiden_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
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