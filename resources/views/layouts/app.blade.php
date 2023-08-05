<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('/css/styleAdd.css') }}">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link href='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('/js/sideNavBar.js') }}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('/js/sideNavBarData.js') }}"></script>
        <script src="{{ asset('/js/age.js') }}"></script>
        <script src='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js'></script>

    </head>
    <body>
        <div id="appHeader">
            @include('/layouts.header')
        </div>
        <div id="appBody">
            @include('/layouts.sideNavBar')
            @yield('content')
        </div>
        <div id="appFooter">
            @include('/layouts.footer')
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('/js/sideNavBarData.js') }}"></script>
        <script src="{{ asset('/js/newTab.js') }}"></script>
        <script>
            var appBodyHeight = document.getElementById('appBody').offsetHeight;
            var viewport = window.innerHeight;
            var appHeaderHeight = document.getElementById('appHeader').offsetHeight;
            var appFooterHeight = document.getElementById('appFooter').offsetHeight;

            var bodyHeight = viewport - appHeaderHeight - appFooterHeight;
            var toogleBoolean = false;

            if(appBodyHeight >= bodyHeight){
                document.getElementById('appBody').style.height = 'auto';
            }else{
                bodyHeight = bodyHeight + 'px';
                document.getElementById('appBody').style.height = bodyHeight;
            }

            function changeHeight(){
                var appBodyHeight = document.getElementById('appBody').offsetHeight;
                var viewport = window.innerHeight;
                var appHeaderHeight = document.getElementById('appHeader').offsetHeight;
                var appFooterHeight = document.getElementById('appFooter').offsetHeight;

                var bodyHeight = viewport - appHeaderHeight - appFooterHeight;

                if(appBodyHeight >= bodyHeight){
                    document.getElementById('appBody').style.height = 'auto';
                    document.getElementById('controls').style.marginBottom = '1rem';
                }else{
                    bodyHeight = bodyHeight + 'px';
                    document.getElementById('appBody').style.height = bodyHeight;
                }
            }

            bodyHeight = bodyHeight + appFooterHeight + 'px';
            document.getElementById('carousel1').style.height = bodyHeight;
            document.getElementById('carousel2').style.height = bodyHeight;
            document.getElementById('carousel3').style.height = bodyHeight;


            function toggleList(){
                if(toogleBoolean == false){
                    toogleBoolean = true;
                    $("#navbarSupportedContent").addClass('show');
                }else{
                    toogleBoolean = false;
                    $("#navbarSupportedContent").removeClass('show');
                }
            }
        </script>
    </body>
</html>
