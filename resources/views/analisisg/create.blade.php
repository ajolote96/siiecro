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
                <h1>Solicitud de Análisis Científico

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
                <form action="{{ route('AnalisisCientifico.store') }}" method="POST" class="form-inline text-left" enctype="multipart/form-data">
                    @csrf

                    <BR>
                    <div class="form-group">
                        <div class="form-group">
                            <input type="hidden" name="id_obra" class="form-control"  value="{{ $obra->id }}" style="width:200px" readonly>
                            <div class="input-group" >
                                <label for="id_de_obra" class="input-group-addon">ID Obra </label>
                                <input type="text" name="id_de_obra" class="form-control"  value="{{ $obra->id_de_obras }}" style="width:200px" readonly><BR>
                            </div>
                            <div class="input-group" >
                                <label for="titulo_obra" class="input-group-addon">Titulo de la obra/pieza</label>
                                <input type="text" name="titulo_obra" class="form-control"  value="{{ $obra->titulo_obra }}" style="width:200px" readonly><BR>
                            </div>
							<div class="form-group">
							<div class="input-group">
                                <span class="input-group-addon">Temporalidad</span>
                                <input type="text" name="temp_obra" class="form-control"  value="{{ $obra->temp_obra }}" style="width:200px" readonly>
                            </div>
                        	</div><br><br>

                            <div class="input-group ">
                                <label for="epoca_obra" class="input-group-addon">Epoca de la obra</label>
                                <input type="text" name="epoca_obra" class="form-control"  value="{{ $obra->epoca_obra }}" style="width:200px" readonly>
                            </div>
                            <div class="input-group">
                                <label for="tipo_obj_obra" class="input-group-addon">Tipo de objeto de la obra</label>
                                <input type="text" name="tipo_obj_obra" class="form-control"  value="{{$obra->tipo_obj_obra }}" style="width:200px" readonly>
                            </div>
                        </div><br><br>


                    	<div class="form-group">



                    <div class="input-group">
                        <label for="respon_intervencion" class="input-group-addon">Responsable de la Intervencion</label>
                        <input type="text" class="form-control"  name="respon_intervencion"  value="{{ old('respon_intervencion') }}" style="width:200px">
                    </div>

                </div><br><br>
                      <div class="input-group">
                        <label for="foto" class="input-group-addon">Foto</label>
                        <input type="file" class="form-control"  name="foto"  >
                    </div>

                    <div class="input-group">
                    <div class="input-group date">

                        <div class="input-group-addon">
                             <i class="fa fa-calendar"> Fecha de inicio</i>

                        </div>

                        <input type="date" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)"value="{{ old('fecha_de_inicio') }}" style="width:262px">
                    </div>


                    </div>
                    </div><br><br><br>


                    <div class="form-group">

                    <div class="input-group">
                        <label for="tecnica" class="input-group-addon">Tecnica</label>
                        <input type="text" class="form-control"  name="tecnica" value="{{ old('tecnica') }}" style="width:200px">
                    </div><br><br>
                    <div class="col-md-12"></div>

                    <div class="input-group">
                        <div class="input-group">
                            <label class="input-group-addon">Dimensiones</label>
                            <label class="input-group-addon">Alto</label>
                            <input type="text" class="form-control" name="alto" value="{{ old('alto') }}"><br>
                            <label class="input-group-addon">Ancho</label>
                            <input type="text" class="form-control" name="ancho" value="{{ old('ancho') }}"><br>
                            <label class="input-group-addon">Profundidad</label>
                            <input type="text" class="form-control" name="profundidad" value="{{ old('profundidad') }}"><br>
                            <label class="input-group-addon">Diametro</label>
                            <input type="text" class="form-control" name="diametro" value="{{ old('diametro') }}"><br>
                        </div>

                    </div><br><br>


                </div><br><br>
                <table class="table table-bordered"><b>ANALISIS</b><br>
                    <thead>
                        <tr>
                            <th><label><input type="checkbox" name="tsoporte" id="tsoporte" onchange="javascript:showSoporte()"> SOPORTE</label><br></th>
                            <th><label><input type="checkbox" name="tbase" id="tbase" onchange="javascript:showBase()"> BASE DE PREPARACIóN</label><br></th>
                            <th><label><input type="checkbox" name="testra" id="testra" onchange="javascript:showEstra()"> ESTRATIGRAFíA</label></th>
                            <th><label><input type="checkbox" name="trevo" id="trevo" onchange="javascript:showRevo()"> REVOQUE Y ENLUCIDO</label></th>
                            <th><label><input type="checkbox" name="tbol" id="tbol" onchange="javascript:showBol()"> BOL</label></th>
                            <th><label><input type="checkbox" name="tlame" id="tlami" onchange="javascript:showLami()"> LáMINAS METáLICAS</label></th>
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
                <div class="input-group" id="tabso" style="display: none;">
                    <div class="input-group" id="inputsoporte" >
                    <table class="table table-bordered"><strong>I.SOPORTE</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color: #7C858C; color:white; width:300px">Número de muestra </th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="Smuestra0" style="width:300px"></td>
                                <td><input type="text" name="Snomenclatura0" style="width:300px"></td>
                                <td><input type="text" name="Sinf_requerida0" style="width:300px"></td>
                                <td><input type="text" name="Sdes_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="width:300px">Ubicación</th>
                                <th style="width:300px">Responsable</th>
                                <th style="width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Subicacion0" style="width:300px"></td>
                                <td><input type="text" name="Sresponsable0" style="width:300px"></td>
                                <td><input type="text" name="Siden_muestra0" style="width:300px"></td>

                            </tr>

                        </tbody>


                    </table>
                    </div>
                    <div align="center">
                    <input type="button" id="otrosoporte" name="otrosoporte" class="btn-sm"  value="Agregar más" onclick="javascript:massoporte()">
                    <br><br>
                </div>
                </div>
                <div class="input-group" id="tabbase" style="display: none;">
                    <div class="input-group" id="inputbase" >
                    <table class="table table-bordered"><strong>II.BASE DE PREPARACIóN</strong>
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripción de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="BPmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="BPnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="BPinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="BPdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="width:300px">Ubicación</th>
                                <th style="width:300px">Responsable</th>
                                <th style="width:300px">No. de indentificación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="BPubicacion0" style="width:300px"></td>
                                <td><input type="text" name="BPresponsable0" style="width:300px"></td>
                                <td><input type="text" name="BPiden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <div align="center">
                    <input type="button" id="otrobase" name="otrobase" class="btn-sm"  value="Agregar más" onclick="javascript:masbase()">
                    <br><br>
                </div>
                </div>


                <div class="input-group" id="tabestra" style="display: none;">
                    <table class="table table-bordered"><strong>III.ESTRATIGRAFíA</strong>
                        <thead>
                            <tr align="center">
                                <th style="width:300px"> Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripción de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Emuestra" style="width:300px"></td>
                                        <td><input type="text" name="Enomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="Einf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="Edes_muestra" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="width:300px">Ubicación</th>
                                <th style="width:300px">Motivo</th>
                                <th style="width:300px">Responsable</th>
                                <th style="width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Eubicacion" style="width:300px"></td>
                                <td><input type="text" name="Emotivo" style="width:300px"></td>
                                <td><input type="text" name="Eresponsable" style="width:300px"></td>
                                <td><input type="text" name="Eiden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="input-group" id="tabrevo" style="display: none;">
                    <table class="table table-bordered"><strong>IV.REVOQUE Y ENLUCIDO</strong>
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="REmuestra" style="width:300px"></td>
                                        <td><input type="text" name="REnomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="REinf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="REdes_muestra" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="width:300px">Ubicación</th>
                                <th style="width:300px">Motivo</th>
                                <th style="width:300px">Responsable</th>
                                <th style="width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="REubicacion" style="width:300px"></td>
                                <td><input type="text" name="REmotivo" style="width:300px"></td>
                                <td><input type="text" name="REresponsable" style="width:300px"></td>
                                <td><input type="text" name="REiden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="input-group" id="tabbol" style="display: none;">
                    <table class="table table-bordered"><strong>V.BOL</strong>
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="BOLmuestra" style="width:300px"></td>
                                        <td><input type="text" name="BOLnomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="BOLinf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="BOLdes_muestra" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="width:300px">Ubicación</th>
                                <th style="width:300px">Motivo</th>
                                <th style="width:300px">Responsable</th>
                                <th style="width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="BOLubicacion" style="width:300px"></td>
                                <td><input type="text" name="BOLmotivo" style="width:300px"></td>
                                <td><input type="text" name="BOLresponsable" style="width:300px"></td>
                                <td><input type="text" name="BOLiden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="input-group" id="tablami" style="display: none;">
                    <table class="table table-bordered"><strong>VI.LAMINAS METALICAS</strong>
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="LMmuestra" style="width:300px"></td>
                                        <td><input type="text" name="LMnomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="LMinf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="LMdes_muestra" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="width:300px">Ubicación</th>
                                <th style="width:300px">Motivo</th>
                                <th style="width:300px">Responsable</th>
                                <th style="width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="LMubicacion" style="width:300px"></td>
                                <td><input type="text" name="LMmotivo" style="width:300px"></td>
                                <td><input type="text" name="LMresponsable" style="width:300px"></td>
                                <td><input type="text" name="LMiden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="input-group" id="tabpig" style="display: none;">
                    <table class="table table-bordered"><strong>VII.PIGMENTOS</strong>
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Pmuestra" style="width:300px"></td>
                                        <td><input type="text" name="Pnomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="Pinf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="Pdes_muestra" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="width:300px">Ubicación</th>
                                <th style="width:300px">Motivo</th>
                                <th style="width:300px">Responsable</th>
                                <th style="width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Pubicacion" style="width:300px"></td>
                                <td><input type="text" name="Pmotivo" style="width:300px"></td>
                                <td><input type="text" name="Presponsable" style="width:300px"></td>
                                <td><input type="text" name="Piden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="input-group" id="tabaglu" style="display: none;">
                    <table class="table table-bordered"><strong>VIII.AGLUTINANTE</strong>
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Amuestra" style="width:300px"></td>
                                        <td><input type="text" name="Anomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="Ainf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="Ades_muestra" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="width:300px">Ubicación</th>
                                <th style="width:300px">Motivo</th>
                                <th style="width:300px">Responsable</th>
                                <th style="width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Aubicacion" style="width:300px"></td>
                                <td><input type="text" name="Amotivo" style="width:300px"></td>
                                <td><input type="text" name="Aresponsable" style="width:300px"></td>
                                <td><input type="text" name="Aiden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div><div class="input-group" id="tabrecu" style="display: none;">
                    <table class="table table-bordered"><strong>IX.RECUBRIMIENTO</strong>
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Rmuestra" style="width:300px"></td>
                                        <td><input type="text" name="Rnomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="Rinf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="Rdes_muestra" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="width:300px">Ubicación</th>
                                <th style="width:300px">Motivo</th>
                                <th style="width:300px">Responsable</th>
                                <th style="width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Rubicacion" style="width:300px"></td>
                                <td><input type="text" name="Rmotivo" style="width:300px"></td>
                                <td><input type="text" name="Rresponsable" style="width:300px"></td>
                                <td><input type="text" name="Riden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- MATERIAL ASOCIADO X -->
                <div class="input-group" id="tabmaso" style="display: none;">
                <div class="input-group" id="inputmaso" > 
                    <table class="table table-bordered"><strong>X.MATERIAL ASOCIADO</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color:#8686C4; color:white; width:300px">Número de muestra</th>
                                <th style="background-color:#8686C4; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color:#8686C4; color:white; width:300px">Información requerida</th>
                                <th style="background-color:#8686C4; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="MASOmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="MASOnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="MASOinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="MASOdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color:#8686C4; color:white; width:300px">Ubicación</th>
                                <th style="background-color:#8686C4; color:white; width:300px">Responsable</th>
                                <th style="background-color:#8686C4; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="MASOubicacion0" style="width:300px"></td>
                                <td><input type="text" name="MASOresponsable0" style="width:300px"></td>
                                <td><input type="text" name="MASOiden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div align="center">
                        <input type="button" id="otromaso" name="otromaso" class="btn-sm"  value="Agregar más" onclick="javascript:masmaso()">
                        <br><br>
                    </div>
                </div>


                <!-- SALES XI -->
                <div class="input-group" id="tabsal" style="display: none;">
                <div class="input-group" id="inputsales" > 
                    <table class="table table-bordered"><strong>XI.SALES</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color:#009999; color:white; width:300px">Número de muestra</th>
                                <th style="background-color:#009999; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color:#009999; color:white; width:300px">Información requerida</th>
                                <th style="background-color:#009999; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="SALmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="SALnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="SALinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="SALdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color:#009999; color:white; width:300px">Ubicación</th>
                                <th style="background-color:#009999; color:white; width:300px">Responsable</th>
                                <th style="background-color:#009999; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="SALubicacion0" style="width:300px"></td>
                                <td><input type="text" name="SALresponsable0" style="width:300px"></td>
                                <td><input type="text" name="SALiden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div align="center">
                        <input type="button" id="otrosal" name="otrosal" class="btn-sm"  value="Agregar más" onclick="javascript:massales()">
                        <br><br>
                    </div>
                </div>



                <!-- NATERIAL AGREGADO XII-->
                <div class="input-group" id="tabmagre" style="display: none;">
                <div class="input-group" id="inputmaterialag" > 
                    <table class="table table-bordered"><strong>XII.MATERIAL AGREGADO</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color:#7D10C0; color:white; width:300px">Número de muestra</th>
                                <th style="background-color:#7D10C0; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color:#7D10C0; color:white; width:300px">Información requerida</th>
                                <th style="background-color:#7D10C0; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="MAGmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="MAGnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="MAGinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="MAGdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color:#7D10C0; color:white; width:300px">Ubicación</th>
                                <th style="background-color:#7D10C0; color:white; width:300px">Responsable</th>
                                <th style="background-color:#7D10C0; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="MAGubicacion0" style="width:300px"></td>
                                <td><input type="text" name="MAGresponsable0" style="width:300px"></td>
                                <td><input type="text" name="MAGiden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div align="center">
                        <input type="button" id="otromatag" name="otromatag" class="btn-sm"  value="Agregar más" onclick="javascript:masmatag()">
                        <br><br>
                    </div>
                </div>

                <!-- BIODETERIODO XIII-->
                <div class="input-group" id="tabbio" style="display: none;">
                <div class="input-group" id="inputbiodeterioro" > 
                    <table class="table table-bordered"><strong>XIII.BIODETERIODO</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color:#A2C866; color:white; width:300px">Número de muestra</th>
                                <th style="background-color:#A2C866; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color:#A2C866; color:white; width:300px">Información requerida</th>
                                <th style="background-color:#A2C866; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="BDTmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="BDTnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="BDTinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="BDTdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color:#A2C866; color:white; width:300px">Ubicación</th>
                                <th style="background-color:#A2C866; color:white; width:300px">Responsable</th>
                                <th style="background-color:#A2C866; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="BDTubicacion0" style="width:300px"></td>
                                <td><input type="text" name="BDTresponsable0" style="width:300px"></td>
                                <td><input type="text" name="BDTiden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div align="center">
                        <input type="button" id="otrobio" name="otrobio" class="btn-sm"  value="Agregar más" onclick="javascript:masbio()">
                        <br><br>
                    </div>
                </div>

                <!--OTROS XIV-->
                <div class="input-group" id="tabotro" style="display: none;">
                    <div class="input-group" id="inputotros">
                    <table class="table table-bordered"><strong>XIV.OTROS</strong>
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="OTmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="OTnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="OTinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="OTdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="width:300px">Ubicación</th>
                                <th style="width:300px">Responsable</th>
                                <th style="width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="OTubicacion0" style="width:300px"></td>
                                <td><input type="text" name="OTresponsable0" style="width:300px"></td>
                                <td><input type="text" name="OTiden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div align="center">
                        <input type="button" id="otrootros" name="otrootros" class="btn-sm"  value="Agregar más" onclick="javascript:masotros()">
                        <br><br>
                    </div>
                </div>
                    <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Capturar</button>
                            <a href="{{route('Obras.index')}}" class="btn btn-danger btn-sm">Cancelar</a>
                    </div>
                </form>
        </div>
	</div>
</div>
@endsection
