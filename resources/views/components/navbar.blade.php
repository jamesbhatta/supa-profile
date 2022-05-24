<div id="navbar" class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-deep-blue flex-fill z-depth-0">
        <a id="sidebar-toggler" class="text-white mr-3" onclick="toggleSidebar()">
            <span class="navbar-toggler-icon"></span>
        </a>

        <a class="navbar-brand" href="{{ route('home') }}">{{ __('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        @if(App::getLocale() == 'np') <span class="svg-icon">@include('svg.flag-np')</span> नेपाली @endif
                        @if(App::getLocale() == 'en') <span class="svg-icon">@include('svg.flag-us')</span> Eng @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        @if(App::getLocale() != 'np')
                        <a class="dropdown-item" href="{{ route('locale', 'np') }}"> <span class="svg-icon">@include('svg.flag-np')</span> नेपाली</a>
                        @endif
                        @if(App::getLocale() != 's')
                        <a class="dropdown-item" href="{{ route('locale', 'en') }}"> <span class="svg-icon">@include('svg.flag-us')</span> English</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="{{ route('password.change.form', Auth::user()) }}">Change Password</a>
                        @hasanyrole('super-admin|admin')
                        <a class="dropdown-item" href="{{ route('configuration-checklist.index') }}">@lang('navigation.configuration_checklist')</a>
                        @endhasanyrole
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
               
            </ul>
        </div>
    </nav>
</div>
