<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @isset($title) {{ $title }} | @endisset {{ config('app.name', __('appname')) }}
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

        .subMenu {
            display: none;
        }

    </style>
</head>
<body class="sidebar-opened">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0&appId=2382258412091952&autoLogAppEvents=1" nonce="EfHGDER9"></script>
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
