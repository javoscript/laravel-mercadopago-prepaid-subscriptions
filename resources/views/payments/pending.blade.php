<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <svg width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"     viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve"><g>    <circle cx="30" cy="26" r="1"/>    <circle cx="33" cy="24" r="1"/>    <circle cx="27" cy="24" r="1"/>    <circle cx="24" cy="22" r="1"/>    <circle cx="36" cy="22" r="1"/>    <circle cx="39" cy="20" r="1"/>    <circle cx="21" cy="20" r="1"/>    <circle cx="30" cy="22" r="1"/>    <circle cx="30" cy="34" r="1"/>    <circle cx="30" cy="37" r="1"/>    <circle cx="30" cy="40" r="1"/>    <circle cx="30" cy="43" r="1"/>    <circle cx="30" cy="46" r="1"/>    <circle cx="30" cy="49" r="1"/>    <path d="M54,58h-3v-4h-5V43.778c0-2.7-1.342-5.208-3.589-6.706L31.803,30l10.608-7.072C44.658,21.43,46,18.922,46,16.222V6h5V2h3        c0.552,0,1-0.447,1-1s-0.448-1-1-1h-3h-1H10H9H6C5.448,0,5,0.447,5,1s0.448,1,1,1h3v4h5v10.222c0,2.7,1.342,5.208,3.589,6.706        L28.197,30l-10.608,7.072C15.342,38.57,14,41.078,14,43.778V54H9v4H6c-0.552,0-1,0.447-1,1s0.448,1,1,1h3h1h40h1h3        c0.552,0,1-0.447,1-1S54.552,58,54,58z M18.698,21.264C17.009,20.137,16,18.252,16,16.222V6h28v10.222        c0,2.03-1.009,3.915-2.698,5.042L30,28.798L18.698,21.264z M16,43.778c0-2.03,1.009-3.915,2.698-5.042L30,31.202l11.302,7.534        C42.991,39.863,44,41.748,44,43.778V54H16V43.778z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                </div>
                <div class="links">
                    Gracias por la compra! <br>
                    Estamos esperando que se procese correctamente.
                    <div>
                        @if (Route::has('home'))
                            <a class="btn btn-default" href="{{ route('home') }}">Volver</a>
                        @else
                            <a class="btn btn-default" href="/">Volver</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


