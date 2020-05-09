<head>
    <meta charset="UTF-8">
    <title> SIIECRO  </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script>
$(document).ready(function(){
    $('.zoom').hover(function() {
        $(this).addClass('transition');
    }, function() {
        $(this).removeClass('transition');
    });
});
</script>
   <!--  HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
<!-- <script type="text/javascript">

    $(".validar_form").submit(function () {
        element = document.getElementById("cultura");
var select = $("#tipo_bien_cultu").val();
if (select == 'Arqueológico') {
    $element.style.display='block';
} else {
    element.style.display='none';
}
});
</script>
    <script type="text/javascript">
    function showAño() {
        element = document.getElementById("cultura");
        tipo_bien_cultu = document.getElementById("tipo_bien_cultu");
        if (tipo_bien_cultu == 'Arqueológico') {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script> -->
<script type="text/javascript">
  function tipodebien(sel) {
      if (sel.value=="Arqueológico"){
           $("#cultura").show();
           $("#tempo").show();
           $("#autor").hide();
           $("#año").hide();
           $("#epoca").hide();
           $("#añocon").hide();
           $("#epocacon").hide();
           $("#añoaprox").hide();
           $("#epocaaprox").hide();

      }else{
        $("#año").show();
           $("#epoca").show();
            $("#tempo").hide();
           $("#cultura").hide();
           $("#autor").show();
           $("#añocon").show();
           $("#epocacon").show();
           $("#añoaprox").show();
           $("#epocaaprox").show();

      }
}
</script>
    <script type="text/javascript">
    function showSoporte() {
        element = document.getElementById("tabso");
        tsoporte = document.getElementById("tsoporte");
        if (tsoporte.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>
<script type="text/javascript">
    function showBase() {
        element = document.getElementById("tabbase");
        tbase = document.getElementById("tbase");
        if (tbase.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showEstra() {
        element = document.getElementById("tabestra");
        testra = document.getElementById("testra");
        if (testra.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showRevo() {
        element = document.getElementById("tabrevo");
        trevo = document.getElementById("trevo");
        if (trevo.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showBol() {
        element = document.getElementById("tabbol");
        tbol = document.getElementById("tbol");
        if (tbol.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showLami() {
        element = document.getElementById("tablami");
        tlami = document.getElementById("tlami");
        if (tlami.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showPig() {
        element = document.getElementById("tabpig");
        tpig = document.getElementById("tpig");
        if (tpig.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showAglu() {
        element = document.getElementById("tabaglu");
        taglu = document.getElementById("taglu");
        if (taglu.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showRecu() {
        element = document.getElementById("tabrecu");
        trecu = document.getElementById("trecu");
        if (trecu.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showMaso() {
        element = document.getElementById("tabmaso");
        tmaso = document.getElementById("tmaso");
        if (tmaso.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showSal() {
        element = document.getElementById("tabsal");
        tsal = document.getElementById("tsal");
        if (tsal.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showMagre() {
        element = document.getElementById("tabmagre");
        tmagre = document.getElementById("tmagre");
        if (tmagre.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showBio() {
        element = document.getElementById("tabbio");
        tbio = document.getElementById("tbio");
        if (tbio.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showOtro() {
        element = document.getElementById("tabotro");
        totro = document.getElementById("totro");
        if (totro.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>


</head>
