@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
<script>
    var reports = {!! json_encode($report->toArray()) !!};
</script>
<!--Carousel Wrapper-->
<div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
  <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active bg-image bc1" id="carousel1">
            <div class="container-mp-images">
                <div class="container-mp-text">
                    <h2 class="h2-text" style="color:white;">O tráfico envolve bilhões de Pessoas</h2>
                    <p class="p-text" style="color:white;">É uma das atividades de maior crescimento</p>
                </div>
            </div>
        </div>
        <div class="carousel-item bg-image bc2" id="carousel2">
            <div class="container-mp-images">
                <div class="container-mp-text">
                    <h2 class="h2-text" style="color:white;">O tráfico não envolve só exploração sexual</h2>
                    <p class="p-text" style="color:white;">Tráfico de crianças e casamento forçado são mais exemplos</p>
                </div>
            </div>
        </div>
        <div class="carousel-item bg-image bc3" id="carousel3">
            <div class="container-mp-images">
                <div class="container-mp-text">
                    <h2 class="h2-text" style="color:white;">Reporte casos de tráfico</h2>
                    <p class="p-text" style="color:white;">As proximas gerações dependem disso</p>
                </div>
            </div>
        </div>
    </div>
    <!--/.Slides-->
</div>
<!--/.Carousel Wrapper-->
<div class="parent">
    <div class="total">
        <div class="left" id="maps">
            <div class="mapa" id='map' style='width: 100%; height: ;'></div>
            <script>
                var appsss = document.getElementById('maps').offsetWidth;
                console.log(appsss);

                var newHeights = appsss / 0.625;
                var newHeightss = newHeights + 'px';
                console.log(newHeightss);
                document.getElementById('map').style.height = newHeightss;
            </script>
        </div>
    <div class="right">
        <div class="legenda">
        @guest
            <h1 class="titulo"> <b> Descrição </b></h1>
            <hr class="linereport">
            <p class="defenicoestexto"> Neste mapa pode visualizar a localização de ocorrências feitas pelos nossos utilizadores e como está a ser processada.</p>
            <hr class="linereport">
        @endguest
            <h1 class="titulo"> <b> Legenda </b></h1>
            <hr class="linereport">
            <p class="legendatexto"> Ocorrência Confirmada:</p> <div class="markers-verified"> </div> <br>
            <p class="legendatexto"> Ocorrência Pendente:</p> <div class="markers-process"> </div> <br>
            <hr class="linereport">
    </div>
    @auth
        <form method="POST" class="caixa" action="{{ route('report.store') }}">
            @csrf
    <h1 class="titulo"> <b> Reportar Ocorrência </b> </h1>
    <hr class="linereport">
    <h3 class="subtitulo"> <b> Campos Obrigatórios </b></h3>
    <select class="{{ $errors->has('report_type') ? 'is-invalid' : ''}}" name="report_type" required>
        <option value="">Tipo de Ocorrência...</option>
        <option value="Exploracao Sexual">Exploracao Sexual</option>
        <option value="Exploracao de Trabalho">Exploracao de Trabalho</option>
        <option value="Casamento Forcado">Casamento Forcado</option>
        <option value="Criminalidade Forcado">Criminalidade Forcado</option>
        <option value="Criancas Soldados">Criancas Soldados</option>
        <option value="Trafico de Orgaos">Trafico de Orgaos</option>
        <option value="Trafico de Criancas">Trafico de Criancas</option>
        <option value="Trafico de Adultos">Trafico de Adultos</option>
        <option value="Outro Tipo de Trafico">Outro Tipo de Trafico</option>
    </select>

    @if ($errors->has('report_type'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('report_type') }}</strong>
        </span>
    @endif

    <select class="{{ $errors->has('city') ? 'is-invalid' : ''}}" name="city" required>
        <option value="">Distrito...</option>
        <option value="Aveiro">Aveiro</option>
        <option value="Beja">Beja</option>
        <option value="Braga">Braga</option>
        <option value="Braganca">Braganca</option>
        <option value="Castelo Branco">Castelo Branco</option>
        <option value="Coimbra">Coimbra</option>
        <option value="Evora">Evora</option>
        <option value="Faro">Faro</option>
        <option value="Guarda">Guarda</option>
        <option value="Leiria">Leiria</option>
        <option value="Lisboa">Lisboa</option>
        <option value="Portalegre">Portalegre</option>
        <option value="Porto">Porto</option>
        <option value="Santarem">Santarem</option>
        <option value="Setubal">Setubal</option>
        <option value="Viana do Castelo">Viana do Castelo</option>
        <option value="Vila Real">Vila Real</option>
        <option value="Viseu">Viseu</option>
    </select>
    @if ($errors->has('city'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('city') }}</strong>
    </span>
@endif

    <hr class="linereport">
    <h3 class="subtitulo"> <b>Campos Opcionais </b></h3>
    <select class=" {{ $errors->has('persons') ? 'is-invalid' : ''}}" name="persons" required>
        <option value="1">Nº de pessoas...</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="5+">5+</option>
    </select>
    @if ($errors->has('persons'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('persons') }}</strong>
        </span>
    @endif

    <textarea maxlength="250" type="textarea" maxlength="255" class = "textarea {{ $errors->has('description') ? 'is-invalid' : ''}}" name="description" placeholder="Digite com detalhe a ocorrência (zona especifica, descrever as suas aparencias...) (Opcional)"></textarea>
    <hr class="linereport">
    <button type="submit"  class="btnreport"> <b> Enviar Report </b></button>
        </form>
    </div>
    @endauth
    </div>
</div>

<div class="information">
    <div class="information-container">
        <div class="maincontainer">
            <div class="thecard">
                <div class="thefront"><h1>Tráfico Humano</h1><p>O Tráfico de Seres Humano é CRIME!</p></div>
                <div class="theback"><h1>Continução...</h1>
                <p>É um crime contra a liberdade pessoal, que afeta milhões de pessoas em todo o mundo. Envolve a movimentação de pessoas entre fronteiras internacionais ou dentro de um mesmo país, com o objetivo de as sujeitar a diversos tipos de exploração.</p></div>
            </div>
        </div>
        <div class="maincontainer1">
            <div class="thecard1">
                <div class="thefront"><h1>Que meios são utilizados?</h1><p>A vítima pode ser abordada de variadas maneiras.</p></div>
                <div class="theback"><h1>Continução...</h1>
                    <p>Violência;
                    <br> Rapto;
                    <br> Ameaça grave;
                    <br> Ardil ou manobra fraudulenta;
                    <br> Abuso de autoridade;
                    <br> Aproveitamento de incapacidade psíquica ou especial vulnerabilidade;</p>
                </div>
            </div>
        </div>
        <div class="maincontainer2">
            <div class="thecard2">
                <div class="thefront"><h1>Jogos Didaticos</h1><p>Aprenda mais sobre este tema com alguns dos jogos didaticos feitos por nós.</p></div>
                <div class="theback"><h1>Links</h1>
                    <p style="text-align: center;"><a href="https://onedrive.live.com/?authkey=%21AC%5Fmqex3ETvf3b0&cid=499CD362FC9F68D4&id=499CD362FC9F68D4%21762&parId=root&action=locate">BeSafe</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="carrousel">
    <div class="w3-content w3-display-container">
        <video class="mySlides" width="980" height="550" controls>
            <source src="/mat/Historia1.mp4" type="video/mp4">
                Video não é suportado pelo browser!
        </video>
        <video class="mySlides" width="980" height="550" controls>
            <source src="/mat/Historia2.mp4" type="video/mp4">
                Video não é suportado pelo browser!
        </video>
        <video class="mySlides" width="980" height="550" controls>
            <source src="/mat/Historia3.mp4" type="video/mp4">
                Video não é suportado pelo browser!
        </video>
        <video class="mySlides" width="980" height="550" controls>
            <source src="/mat/Historia4.mp4" type="video/mp4">
                Video não é suportado pelo browser!
        </video>

        <button class="w3-button w3-black w3-display-left"  onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>
</div>

<script>

var card = document.querySelector('.thecard');
card.addEventListener( 'click', function() {
  card.classList.toggle('is-flipped');
});

var card1 = document.querySelector('.thecard1');
card1.addEventListener( 'click', function() {
  card1.classList.toggle('is-flipped');
});

var card2 = document.querySelector('.thecard2');
card2.addEventListener( 'click', function() {
  card2.classList.toggle('is-flipped');
});

var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
    }
</script>
<script>

    var i = 0;
    var ver = [];
    var markersArray = [];

    for (i ; i < reports.length; i++) {
        if(reports[i].idReportState === 1){
            ver.push('Process');
        }else if(reports[i].idReportState === 2){
            ver.push('Verified');
        }
    };

    var i = 0;
    for (i ; i < reports.length; i++) {
        var markers = {
            type: 'Feature',
            geometry: {
                type: 'Point',
                coordinates: [reports[i].Longitude, reports[i].Latitude],
            },
            properties: {
                location: reports[i].city,
                type: reports[i].report_type,
            },
        };

        markersArray.push(markers);
    };

    mapboxgl.accessToken = 'pk.eyJ1IjoieGRhcmtzb3dscyIsImEiOiJja2JubnJmeXMwbm9yMnhtaWNsNW13cXFtIn0.71l3lFySFaCM79lA7vdhbA';

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/xdarksowls/ckbr1ei5k2gkn1iloygat259e',
        center: [-8, 39.600],// starting position [lng, lat]
        minZoom: 0,
        maxZoom: 9, // starting zoom
        zoom: 0,
        maxBounds: [[-10.261, 36.8],[-5.8, 42.3]]
    });

    var geojson = {
        type: 'FeatureCollection',
        features: markersArray
    };


    var protected = 0;
    geojson.features.forEach(function(marker) {

        // create a HTML element for each feature
        var el = document.createElement('div');
        if(ver[protected] == 'Verified'){
            el.className = 'markers-verified';
        }else if(ver[protected] == 'Process'){
            el.className = 'markers-process';
        }

        protected += 1;
        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el)
            .setLngLat(marker.geometry.coordinates)
            .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
                .setHTML('<h3>' + marker.properties.location + '</h3><p>' + marker.properties.type + '</p>'))
            .addTo(map);
    });
</script>
@endsection

