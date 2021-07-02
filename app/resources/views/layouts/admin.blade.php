<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-fluid">

            <div class="row">

                <div class="col-2 py-4" style="background: #333;color: #ddd;min-height: 100vh;">
                    <div style="position: fixed;">
                        <div class="h3">Меню</div>
                        <ul class="admin-menu">
                            <li><a href="{{route('brands.index')}}">Бренды</a></li>
                            <li><a href="{{route('colors.index')}}">Палитра цветов</a></li>
                            <li><a href="{{route('properties.index')}}">Характеристики</a></li>
                            <li><a href="{{route('motors.index')}}">Агрегаты</a></li>
                            <li><a href="{{route('marks.index')}}">Модели</a></li>
                            <li><a href="{{route('devices.index')}}">Оборудование</a></li>
                            <li><a href="{{route('options.index')}}">Опции</a></li>
                            <li><a href="{{route('complectations.index')}}">Комплектации</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-10 py-4">

                    <main class=" container">

                        @include('admin.messages.message')
                        @include('admin.messages.error')

                        @yield('content')

                        @include('modal.modal')
                    </main>

                </div>
            </div>

        </div>

        
    </div>
</body>
</html>
