@extends('adminlte::layouts.app')
 <script src="js/jquery-3.2.1.js"></script>
    <script src="js/scrpt.jis"></script>
@section('main-content')
<div class="box">
    <div class="box-body"  >
            <div class="panel">

   


    <section class="form_wrap" >

        <section class="cantact_info">
            <section class="info_title">
                <img  style="padding-left: 80px;" src="images/logo_usuario.png" width="180px"  />
                <h2>INFORMACION<br>DE CONTACTO</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> bonilla@gmail.com</p>

            </section>
        </section>

        <form action="{{ route('mensaje') }}" method="POST" class="form_contact">
            <h2>Envia un mensaje</h2>
            <div class="user_info">
                <label for="names">Nombres *</label>
                <input type="text" id="names" name="nombre" required>

                <label for="phone">Telefono / Celular</label>
                <input type="text" id="phone" name="telefono">

                <label for="email">Correo electronico *</label>
                <input type="text" id="email" name="correo"required>

                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje" name="mensaje"required></textarea>

                <input type="submit" value="Enviar Mensaje" id="btnSend">
            </div>
        </form>

    </section>
</div>
</div>
</div>

@endsection
