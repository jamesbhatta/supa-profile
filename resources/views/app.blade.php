<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @isset($title) {{ $title }} | @endisset {{ config('app.name', __('appname')) }}
    </title>

    @include('layouts.partials.styles')
    <style>
        :root {
            --color-main: #2572bc;
        }

        .text-main {
            color: var(--color-main);
        }

        .page-title {
            color: var(--color-main);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center
        }

    </style>
</head>
<body class="sidebar-opened">
    <div id="app">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 z-depth-0">
            <div class="container">
                <!-- Navbar brand -->
                <div class="d-flex">
                    <img src="https://fra.mofaga.gov.np/static/media/logo.940ff832.svg" height="50px">
                    <router-link class="ml-3 navbar-brand text-main" to="/" style="color: #2572bc;">सुदूरपश्चिम प्रोफाइल</router-link>
                </div>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">
                    <!-- Links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/">गृह पृष्ठ</router-link>
                        </li>
                    </ul>
                    <!-- Links -->
                </div>
                <!-- Collapsible content -->
            </div>
        </nav>
        <!--/.Navbar-->

        <router-view></router-view>
    </div>

    {{-- <script src="{{ asset('/js/app.js') }}"></script> --}}
    @include('layouts.partials.scripts')
</body>
</html>
