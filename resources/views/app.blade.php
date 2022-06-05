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
      <navbar></navbar>
        <!--/.Navbar-->

        <router-view></router-view>
    </div>

    {{-- <script src="{{ asset('/js/app.js') }}"></script> --}}
    @include('layouts.partials.scripts')
</body>
</html>
