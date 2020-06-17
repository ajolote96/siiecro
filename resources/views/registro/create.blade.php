@extends('adminlte::layouts.app')
 
@section('main-content')

<!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>{{ $Obrasg->first()->id }}
@endif-->
<div class="box">
    <div class="box-body"  >
            <div class="panel" align="center">
                <h1>Registro de Análisis Científico </h1>
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
                <form action="{{ route('RegistroCientifico.store') }}" method="POST" class="form-inline text-left" enctype="multipart/form-data">
                    @csrf 
                    <input hidden="" type="text" name="id_gene" value="{{ $analisisg->id_general }}">
                    <div align="center">
                        <table style="width: 50%"  border="0">
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos Generales</h3></th></tr>
                            <tr>
                                <td><label for="id_obras" class="input-group-addon" style="width: 400px">ID Obra </label></td>
                                <td><input type="text" name="id_obras" class="form-control"  value="{{ $analisisg->id_de_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label class="input-group-addon">Titulo de la obra/pieza</label></td>
                                <td><input type="text" name="titulo_Obra" class="form-control"  value="{{ $analisisg->titulo_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label class="input-group-addon">Temporada de trabajo</label></td>
                                <td><select class="form-control" name="temporada_trabajo" style="width: 500px; text-align:center;">
                                <option value="" style="text-align:center;">Selecciona una opción</option>
                                @foreach($tempo as $tempos)
                                <option value="{{$tempos->temporada_trabajo}}" >{{$tempos->temporada_trabajo}}</option>
                                @endforeach
                            </select></td>
                            </tr>
                            <tr>    
                                <td><label for="epoca" class="input-group-addon">Epoca de la obra</label></td>
                                <td><input type="text" name="epoca" class="form-control"  value="{{ $analisisg->epoca_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label class="input-group-addon">Año de latemporada de trabajo</label></td>
                                <td><input type="text" class="form-control"  name="anio_temporada"  value="{{ $analisisg->anio_temporada_trabajo}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;"><i class="fa fa-calendar"> Fecha de inicio</i></td>
                                <td><input type="date" class="form-control date" name="fecha_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $analisisg->fecha_de_inicio }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="tecnica" class="input-group-addon">Tecnica</label></td>
                                <td><input type="text" class="form-control"  name="tecnica" value="{{ $analisisg->tecnica }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos de Intentificación de la Muestra</h3></th>
                            </tr>
                            <tr>
                            <tr>
                                <td><label for="nomenclatura_muestra" class="input-group-addon">Nomenclatura de la muestra</label></td>
                                <td><input type="text" class="form-control"  name="nomenclatura_muestra" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="lugar_de_resguardo" class="input-group-addon">Lugar de Resguardo</label></td>
                                <td><input type="text" class="form-control"  name="lugar_de_resguardo" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="caracte_analisis" class="input-group-addon">Caracterizacion de analisis</label></td>
                                <td><input type="text" class="form-control"  name="caracte_analisis" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;"><i class="fa fa-calendar" > Fecha de analisis cientifico</i></td>
                                <td><input type="date" class="form-control date" name="fecha_analisis_cientifico" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="profesor_responsable" class="input-group-addon">Profesor responsable</label></td>
                                <td><input type="text" class="form-control"  name="profesor_responsable" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="persona_realizo_analisis" class="input-group-addon">Persona que realizo el analisis</label></td>
                                <td><input type="text" class="form-control"  name="persona_realizo_analisis" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="forma_obtencion_muestra" class="input-group-addon">Forma de obtencion de las muestras</label></td>
                                <td><input type="text" class="form-control"  name="forma_obtencion_muestra" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="esquema" class="input-group-addon">Esquema</label></td>
                                <td><input type="file" class="form-control"  name="esquema" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="indicaciones" class="input-group-addon">Indicaciones</label></td>
                                <td><input type="text" class="form-control"  name="indicaciones" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="tipo_material" class="input-group-addon">Tipo de material</label></td>
                                <td><input type="text" class="form-control"  name="tipo_material" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="descripcion" class="input-group-addon">Descripcion</label></td>
                                <td><input type="text" class="form-control"  name="descripcion" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="microfotografia" class="input-group-addon">Microfotografia</label></td>
                                <td><input type="file" class="form-control"  name="microfotografia" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="info_definir" class="input-group-addon">Informacion por definir</label></td>
                                <td><input type="text" class="form-control"  name="info_definir" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos Analíticos</h3></th>
                            </tr>
                            <tr>
                                <td><label for="analisis_microestructural" class="input-group-addon">Analisis Morfológico</label></td>
                                <td><input type="text" class="form-control"  name="analisis_morfologico" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="analisis_microquimico" class="input-group-addon">Analisis microquimico</label></td>
                                <td><input type="text" class="form-control"  name="analisis_microquimico" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="analisis_elemental" class="input-group-addon">Analisis microelemental</label></td>
                                <td><input type="text" class="form-control"  name="analisis_elemental" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="analisis_molecular" class="input-group-addon">Analisis molecular</label></td>
                                <td><input type="text" class="form-control"  name="analisis_molecular" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="analisis_de_tincion" class="input-group-addon">Analisis de tincion</label></td>
                                <td><input type="text" class="form-control"  name="analisis_de_tincion" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="analisis_microbiologicos" class="input-group-addon">Analisis Microbiológicos</label></td>
                                <td><input type="text" class="form-control"  name="analisis_microbiologicos" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="otros" class="input-group-addon">Otros</label></td>
                                <td><input type="text" class="form-control"  name="otros" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Resultados</h3></th>
                            </tr>
                            <tr>
                                <td><label for="resultado_conclucion_general" class="input-group-addon">Conclusión Generak</label></td>
                                <td><input type="text" class="form-control"  name="resultado_conclucion_general" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="interpretacion_particular" class="input-group-addon">Interpretación Particular</label></td>
                                <td><input type="text" class="form-control"  name="interpretacion_particular" style="width:500px; text-align:center;"></td>
                            </tr>
                        </table>
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