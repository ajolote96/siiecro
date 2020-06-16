@extends('adminlte::layouts.app')
 
@section('main-content')

<!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>{{ $Obrasg->first()->id }}
@endif-->







 
  <div class="box">
    <div class="box-body">
            <div class="panel">
                <h1 style="background-color: grey; color:white; text-align:center;">Solicitud de Análisis Científico </h1>
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
                        <div class="form-group" style="margin: auto;" >
                            <input type="hidden" name="id_obra" class="form-control"  value="{{ $obra->id }}" style="width:200px" readonly> 
                            <div class="input-group" >
                                <label for="id_de_obra" class="input-group-addon" style="width: 300px; border:0;">ID Obra </label>
                                <input type="text" name="id_de_obra" class="form-control"  value="{{ $obra->id_de_obras }}" style="width:500px; text-align:center; " readonly><BR>    
                            </div>
                            <br><br>
                            <div class="input-group" >
                                <label for="titulo_obra" class="input-group-addon" style="width: 300px; border:0;">Titulo de la obra/pieza</label>
                                <input type="text" name="titulo_obra" class="form-control"  value="{{ $obra->titulo_obra }}" style="width:500px; text-align:center;" readonly><BR> 
                            </div>
                            <br><br>
							<div class="form-group">
							<div class="input-group">
                                <span class="input-group-addon" style="width: 300px; border:0;">Temporalidad</span>
                                <input type="text" name="temp_obra" class="form-control"  value="{{ $obra->temp_obra }}" style="width:500px; text-align:center;" readonly>
                            </div>
                        	</div><br><br>
                        
                            <div class="input-group ">
                                <label for="epoca_obra" class="input-group-addon" style="width: 300px; border:0;">Epoca de la obra</label>
                                <input type="text" name="epoca_obra" class="form-control"  value="{{ $obra->epoca_obra }}" style="width:500px; text-align:center;" readonly>
                            </div>
                            <br><br>
                            <div class="input-group">
                                <label for="tipo_obj_obra" class="input-group-addon" style="width: 300px; border:0;">Tipo de objeto de la obra</label>
                                <input type="text" name="tipo_obj_obra" class="form-control"  value="{{$obra->tipo_obj_obra }}" style="width:500px; text-align:center;" readonly>
                            </div>
                    <!--esto-->    </div><br><br>
                    <div class="form-group">
                    
                    <div class="input-group">
                        <label for="tecnica" class="input-group-addon" style="width: 300px; border:0;">Tecnica</label>
                        <input type="text" class="form-control"  name="tecnica" value="{{ old('tecnica') }}" style="width:500px">
                    </div><br><br>
                    <div class="col-md-12"></div>

                    <div class="input-group" >
                    <div class="form-group" style="margin: auto;">
                    <div class="input-group">


                           <h2>Dimensiones:</h2>
                            <br>
                            <div class="input-group">
                            <label class="input-group-addon"style="width: 300px; border:0;">Alto</label>
                            <input type="text" class="form-control" name="alto" value="{{ old('alto') }}" style="width:500px; text-align:center; ">
                            </div>
                            <br><br>

                            <div class="input-group">
                            <label  class="input-group-addon"style="width: 300px; border:0;">Ancho</label>
                            <input type="text" class="form-control" name="ancho" value="{{ old('ancho') }}"style="width:500px; text-align:center; ">
                            </div>
                            <br><br>
                            <div class="input-group">
                            <label class="input-group-addon" style="width: 300px; border:0;">Profundidad</label>
                            <input type="text" class="form-control" name="profundidad" value="{{ old('profundidad') }}"style="width:500px; text-align:center; ">
                             </div>

                            <br><br>
                            <div class="input-group">
                            <label  class="input-group-addon"style="width: 300px; border:0;">Diametro</label> 
                            <input type="text" class="form-control" name="diametro" value="{{ old('diametro') }}"style="width:500px; text-align:center; "><br>
                            </div>
                        </div>
                    </div>
                    </div><br><br>












                        
       <!-- esto-->     <div class="form-group">
                    
                    
                    
                    <div class="input-group">
                        <label for="respon_intervencion" class="input-group-addon" style="width: 300px; border:0;">Responsable de la Intervencion</label>
                        <input type="text" class="form-control"  name="respon_intervencion"  value="{{ old('respon_intervencion') }}" style="width:500px; text-align:center;">
                    </div>
                    
                </div><br><br>
                      <div class="input-group">
                        <label for="foto" class="input-group-addon "style="width: 300px; border:0;">Foto</label>
                        <input type="file" class="form-control"  name="foto"  style="width: 500px;">
                    </div>
                     <br><br>
                    <div class="input-group">
                    <div class="input-group date">

                        <div class="input-group-addon" style="width: 300px; border:0;">
                             <i class="fa fa-calendar"> Fecha de inicio</i>

                        </div>

                        <input type="date" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)"value="{{ old('fecha_de_inicio') }}" style="width:500px; text-align:center;">
                    </div>
                
                    
                    </div>
                    </div><br><br><br>
                    

                 <!--  <div class="form-group">
                    
                    <div class="input-group">
                        <label for="tecnica" class="input-group-addon" style="width: 300px; border:0;">Tecnica</label>
                        <input type="text" class="form-control"  name="tecnica" value="{{ old('tecnica') }}" style="width:500px">
                    </div><br><br>
                    <div class="col-md-12"></div>

                    <div class="input-group" >
                    <div class="form-group" style="margin: auto;">
                    <div class="input-group">


                           <h2>Dimensiones:</h2>
                            <br>
                            <div class="input-group">
                            <label class="input-group-addon"style="width: 300px; border:0;">Alto</label>
                            <input type="text" class="form-control" name="alto" value="{{ old('alto') }}" style="width:500px; text-align:center; ">
                            </div>
                            <br><br>

                            <div class="input-group">
                            <label  class="input-group-addon"style="width: 300px; border:0;">Ancho</label>
                            <input type="text" class="form-control" name="ancho" value="{{ old('ancho') }}"style="width:500px; text-align:center; ">
                            </div>
                            <br><br>
                            <div class="input-group">
                            <label class="input-group-addon" style="width: 300px; border:0;">Profundidad</label>
                            <input type="text" class="form-control" name="profundidad" value="{{ old('profundidad') }}"style="width:500px; text-align:center; ">
                             </div>

                            <br><br>
                            <div class="input-group">
                            <label  class="input-group-addon"style="width: 300px; border:0;">Diametro</label> 
                            <input type="text" class="form-control" name="diametro" value="{{ old('diametro') }}"style="width:500px; text-align:center; "><br>
                            </div>
                        </div>
                    </div>
                    </div><br><br>
                    aqui termina lo comentado--> 
                    
                </div><br><br>
                <table class="table table-bordered"><b>ANALISIS</b><br>
                    <thead>
                        <tr>
                            <th><label><input type="checkbox" name="tsoporte" id="tsoporte" onchange="javascript:showSoporte()"> SOPORTE</label><br></th>
                            <th><label><input type="checkbox" name="tbase" id="tbase" onchange="javascript:showBase()"> BASE DE PREPARACIÓN</label><br></th>
                            <th><label><input type="checkbox" name="testra" id="testra" onchange="javascript:showEstra()"> ESTRATIGRAFÍA</label></th>
                            <th><label><input type="checkbox" name="trevo" id="trevo" onchange="javascript:showRevo()"> REVOQUE Y ENLUCIDO</label></th>
                            <th><label><input type="checkbox" name="tbol" id="tbol" onchange="javascript:showBol()"> BOL</label></th>
                            <th><label><input type="checkbox" name="tlame" id="tlami" onchange="javascript:showLami()"> LÁMINAS METÁLICAS</label></th>
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
                    <table class="table table-bordered" ><strong>I.SOPORTE</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #C65911; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #C65911; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #C65911; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #C65911; color:white; width:300px">Descripcion de la muestra</th>
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
                                <th style="background-color: #C65911; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #C65911; color:white; width:300px">Responsable</th>
                                <th style="background-color: #C65911; color:white; width:300px">No. de indentificacion</th>
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
                                <th style="background-color: #FFCC66; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Descripción de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="BPmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="BPnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="BPinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="BPdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #FFCC66; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Responsable</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">No. de indentificación</th>
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
                    <div class="input-group" id="inputestratigrafia" >
                    <table class="table table-bordered"><strong>III. ESTRATIGRAFíA</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #008000; color:white; width:300px"> Número de muestra</th>
                                <th style="background-color: #008000; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #008000; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #008000; color:white; width:300px">Descripción de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Emuestra0" style="width:300px"></td>
                                        <td><input type="text" name="Enomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="Einf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="Edes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #008000; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #008000; color:white; width:300px">Responsable</th>
                                <th style="background-color: #008000; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Eubicacion0" style="width:300px"></td>
                                <td><input type="text" name="Eresponsable0" style="width:300px"></td>
                                <td><input type="text" name="Eiden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div align="center">
                    <input type="button" id="otroestratigrafia" name="otroestratigrafia" class="btn-sm"  value="Agregar más" onclick="javascript:masestratigrafia()">
                    <br><br>
                </div>
                </div>
                <div class="input-group" id="tabrevo" style="display: none;">
                    <div class="input-group" id="inputrevoque" >
                    <table class="table table-bordered"><strong>IV.REVOQUE Y ENLUCIDO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #B248A5; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #B248A5; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #B248A5; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #B248A5; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="REmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="REnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="REinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="REdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #B248A5; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #B248A5; color:white; width:300px">Responsable</th>
                                <th style="background-color: #B248A5; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="REubicacion0" style="width:300px"></td>
                                <td><input type="text" name="REresponsable0" style="width:300px"></td>
                                <td><input type="text" name="REiden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <div align="center">
                    <input type="button" id="otrorevoque" name="otrorevoque" class="btn-sm"  value="Agregar más" onclick="javascript:masrevoque()">
                    <br><br>
                </div>
                </div>
                <div class="input-group" id="tabbol" style="display: none;">
                    <div class="input-group" id="inputbol">
                    <table class="table table-bordered"><strong>V.BOL</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FF5050; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #FF5050; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FF5050; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FF5050; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="BOLmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="BOLnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="BOLinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="BOLdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #FF5050; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FF5050; color:white; width:300px">Responsable</th>    
                                <th style="background-color: #FF5050; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="BOLubicacion0" style="width:300px"></td>
                                <td><input type="text" name="BOLresponsable0" style="width:300px"></td>
                                <td><input type="text" name="BOLiden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <div align="center">
                        <input type="button" id="otrobol" name="otrobol" class="btn-sm"  value="Agregar más" onclick="javascript:masbol()">
                        <br><br>
                    </div>
                </div>
                <div class="input-group" id="tablami" style="display: none;">
                    <div class="input-group" id="inputlaminas">
                    <table class="table table-bordered"><strong>VI.LAMINAS METALICAS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #3A5754; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #3A5754; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #3A5754; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #3A5754; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="LMmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="LMnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="LMinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="LMdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #3A5754; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #3A5754; color:white; width:300px">Responsable</th>
                                <th style="background-color: #3A5754; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="LMubicacion0" style="width:300px"></td>
                                <td><input type="text" name="LMresponsable0" style="width:300px"></td>
                                <td><input type="text" name="LMiden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <div align="center">
                        <input type="button" id="otrolaminas" name="otrolaminas" class="btn-sm"  value="Agregar más" onclick="javascript:maslaminas()">
                        <br><br>
                    </div>
                </div>
                <div class="input-group" id="tabpig" style="display: none;">
                    <div class="input-group" id="inputpigmentos">
                    <table class="table table-bordered"><strong>VII.PIGMENTOS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #5B9BD5; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Pmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="Pnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="Pinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="Pdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Responsable</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Pubicacion0" style="width:300px"></td>
                                <td><input type="text" name="Presponsable0" style="width:300px"></td>
                                <td><input type="text" name="Piden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div align="center">
                        <input type="button" id="otropigmentos" name="otropigmentos" class="btn-sm"  value="Agregar más" onclick="javascript:maspigmentos()">
                        <br><br>
                    </div>
                </div>
                <div class="input-group" id="tabaglu" style="display: none;">
                    <div class="input-group" id="inputaglutinante">
                    <table class="table table-bordered"><strong>VIII.AGLUTINANTE</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #F55587; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #F55587; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #F55587; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #F55587; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Amuestra0" style="width:300px"></td>
                                        <td><input type="text" name="Anomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="Ainf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="Ades_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #F55587; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #F55587; color:white; width:300px">Responsable</th>
                                <th style="background-color: #F55587; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Aubicacion0" style="width:300px"></td>
                                <td><input type="text" name="Aresponsable0" style="width:300px"></td>
                                <td><input type="text" name="Aiden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div align="center">
                        <input type="button" id="otroaglutinante" name="otroaglutinante" class="btn-sm"  value="Agregar más" onclick="javascript:masaglutinante()">
                        <br><br>
                    </div>
                </div>
                <div class="input-group" id="tabrecu" style="display: none;">
                    <div class="input-group" id="inputrecubrimiento">
                    <table class="table table-bordered"><strong>IX.RECUBRIMIENTO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FBAE47; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Rmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="Rnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="Rinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="Rdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #FBAE47; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Responsable</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Rubicacion0" style="width:300px"></td>
                                <td><input type="text" name="Rresponsable0" style="width:300px"></td>
                                <td><input type="text" name="Riden_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div align="center">
                        <input type="button" id="otrorecubrimiento" name="otrorecubrimiento" class="btn-sm"  value="Agregar más" onclick="javascript:masrecubrimiento()">
                        <br><br>
                    </div>
                
                </div>  
                <div class="input-group" id="tabmaso" style="display: none;">
                    <table class="table table-bordered"><strong>X.MATERIAL ASOCIADO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="MASOmuestra" style="width:300px"></td>
                                        <td><input type="text" name="MASOnomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="MASOinf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="MASOdes_muestra" style="width:300px"></td>
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
                                <td><input type="text" name="MASOubicacion" style="width:300px"></td>
                                <td><input type="text" name="MASOmotivo" style="width:300px"></td>
                                <td><input type="text" name="MASOresponsable" style="width:300px"></td>
                                <td><input type="text" name="MASOiden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="input-group" id="tabsal" style="display: none;">
                    <table class="table table-bordered"><strong>XI.SALES</strong> 
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="SALmuestra" style="width:300px"></td>
                                        <td><input type="text" name="SALnomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="SALinf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="SALdes_muestra" style="width:300px"></td>
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
                                
                                <td><input type="text" name="SALubicacion" style="width:300px"></td>
                                <td><input type="text" name="SALmotivo" style="width:300px"></td>
                                <td><input type="text" name="SALresponsable" style="width:300px"></td>
                                <td><input type="text" name="SALiden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="input-group" id="tabmagre" style="display: none;">
                    <table class="table table-bordered"><strong>XII.MATERIAL AGREGADO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="MAGREmuestra" style="width:300px"></td>
                                        <td><input type="text" name="MAGREnomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="MAGREinf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="MAGREdes_muestra" style="width:300px"></td>
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
                                <td><input type="text" name="MAGREubicacion" style="width:300px"></td>
                                <td><input type="text" name="MAGREmotivo" style="width:300px"></td>
                                <td><input type="text" name="MAGREresponsable" style="width:300px"></td>
                                <td><input type="text" name="MAGREiden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="input-group" id="tabbio" style="display: none;">
                    <table class="table table-bordered"><strong>XIII.BIOTERIORO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="BIOmuestra" style="width:300px"></td>
                                        <td><input type="text" name="BIOnomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="BIOinf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="BIOdes_muestra" style="width:300px"></td>
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
                                <td><input type="text" name="BIOubicacion" style="width:300px"></td>
                                <td><input type="text" name="BIOmotivo" style="width:300px"></td>
                                <td><input type="text" name="BIOresponsable" style="width:300px"></td>
                                <td><input type="text" name="BIOiden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="input-group" id="tabotro" style="display: none;">
                    <table class="table table-bordered"><strong>XIV.OTROS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="width:300px">Número de muestra</th>
                                <th style="width:300px">Nomenclatura</th>
                                <th style="width:300px">Información requerida</th>
                                <th style="width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="OTROmuestra" style="width:300px"></td>
                                        <td><input type="text" name="OTROnomenclatura" style="width:300px"></td>
                                        <td><input type="text" name="OTROinf_requerida" style="width:300px"></td>
                                        <td><input type="text" name="OTROdes_muestra" style="width:300px"></td>
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
                                <td><input type="text" name="OTROubicacion" style="width:300px"></td>
                                <td><input type="text" name="OTROmotivo" style="width:300px"></td>
                                <td><input type="text" name="OTROresponsable" style="width:300px"></td>
                                <td><input type="text" name="OTROiden_muestra" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Capturar</button>
                            <a href="{{route('Obras.index')}}" class="btn btn-danger btn-sm">Cancelar</a>
                    </div>
                </form>
        </div>
	</div>
<<<<<<< Updated upstream
 </div>



 


=======
</div>
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
>>>>>>> Stashed changes
@endsection