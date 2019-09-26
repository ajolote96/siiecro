@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Registro</div>

					<div class="panel-body">
						 <FORM method="post">
						 	<P>
						 		<LABEL for="nombre">Nombre: </LABEL>
						 		<INPUT type="text" id="nombre"><BR> <!--estos de aca es en donde se meten los datos, nada ams es copiar y pegar y cambiar el nombre de los campos-->
						 		<LABEL for="apellido">Apellido: </LABEL>
						 		<INPUT type="text" id="apellido"><BR>
						 		<LABEL for="email">email: </LABEL>
						 		<INPUT type="text" id="email"><BR>
						 		<INPUT type="submit" value="Enviar"> <!-- este es wl boton para enviar, el tipo de boton es submit y el nombre que va a tener el boton se mete en value-->
						 	</P>
						 </FORM>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
