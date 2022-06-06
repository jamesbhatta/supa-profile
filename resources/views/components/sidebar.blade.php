<div class="py-4 pl-5">
    <img class="img-reponsive" src="{{ asset(config('constants.nep_gov.logo_sm')) }}" alt="Nepal Government Logo" height="80px">
</div>
<div id="sidenav-wrapper">
    <ul id="sidenav" class="nav flex-column font-noto">
        <li class="nav-item {{ setActive('dashboard') }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="text-warning"><i class="fa fa-tachometer-alt"></i></span>@lang('navigation.dashboard')
            </a>
        </li>

        <li class="nav-item {{ setActive('resources.*') }}">
            <a class="nav-link" href="{{ route('resources.index') }}">
                <span class="text-warning"><i class="fa fa-cogs"></i></span>Resources
            </a>
        </li>

        {{-- <li class="nav-item {{ setActive('organization.create') }}">
        <a class="nav-link" href="{{ route('organization.create') }}">
            <span class="text-success"><i class="fa fa-plus"></i></span>@lang('navigation.new_organization')
        </a>
        </li> --}}

        {{-- @hasanyrole('admin|super-admin')
        <li class="nav-item {{ setActive('old-organizations.create') }}">
        <a class="nav-link" href="{{ route('old-organizations.create') }}">
            <span class="text-success"><i class="fa fa-plus"></i></span>@lang('navigation.old_data_entry')
        </a>
        </li>
        @endhasanyrole --}}

        {{-- <li class="nav-item {{ setActive('online-application.*') }}">
        <a class="nav-link" href="{{ route('online-application.index') }}">
            <span class="text-warning"><i class="fab fa-wpforms"></i></span>@lang('navigation.online_forms')
        </a>
        </li> --}}

        {{-- @can('organization.verify')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('organization.index', ['checked' => '1']) }}">
        <span class="cyan-text"><i class="fa fa-check"></i></span>व्यवसाय दर्ता सिफारिस
        </a>
        </li>
        @endcan

        @can('organization.register')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('organization.index', ['verified' => 'true']) }}">
                <span class="text-secondary"><i class="far fa-registered"></i></span>व्यवसाय दर्ता प्रमाणपत्र
            </a>
        </li>
        @endcan --}}

        {{-- changes
        @can('organization.verify')
        <li class="nav-item {{ request()->routeIs('organization.index') && request('checked') && request()->has('verified') && !request('verified') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('organization.index', ['checked' => '1', 'verified' => '0', 'fiscal_year' => runningFiscalYear()->name]) }}">
            <span class="red-text"><i class="far fa-times-circle"></i></span>सिफारिस नभएका
        </a>
        </li>
        @endcan

        @hasanyrole('ward-secretary|admin|super-admin')
        <li class="nav-item {{ request()->routeIs('organization.index') && request('checked') && request('verified') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('organization.index', ['checked' => '1', 'verified' => '1', 'registered' => '0', 'fiscal_year' => runningFiscalYear()->name, 'order_by' => 'created_at']) }}">
                <span class="cyan-text"><i class="fa fa-check"></i></span>सिफारिस भएका
            </a>
        </li>
        @endhasanyrole

        @can('organization.register')
        <li class="nav-item {{ request()->routeIs('organization.index') && request('registered') && !request('closed') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('organization.index', ['registered' => '1', 'closed' => '0', 'fiscal_year' => runningFiscalYear()->name]) }}">
                <span class="text-secondary"><i class="far fa-registered"></i></span>दर्ता भएका
            </a>
        </li>
        @endcan

        @can('organization.register')
        <li class="nav-item {{ request()->routeIs('organization.index') && request('closed') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('organization.index', ['closed' => '1', 'fiscal_year' => runningFiscalYear()->name]) }}">
                <span class="deep-orange-text"><i c <li class="nav-item {{ setActive('organization.create') }}">
                        <a class="nav-link" href="{{ route('organization.create') }}">
                            <span class="text-success"><i class="fa fa-plus"></i></span>@lang('navigation.new_organization')
                        </a>
        </li>lass="far fa-closed-captioning"></i></span>बन्द भएका
        </a>
        </li>
        @endcan

        @can('organization.register')
        <li class="nav-item {{ request()->routeIs('organization.index') && request('checked') && !request()->has('verified') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('organization.index', ['checked' => '1', 'fiscal_year' => runningFiscalYear()->name]) }}">
                <span class="text-warning"><i class="far fa-list-alt"></i></span>सबै
            </a>
        </li>
        @endcan --}}

        {{-- changes --}}

        {{-- @can('organization.close')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('organization.index', ['registered' => 'true']) }}">
        <span class="text-info"><i class="far fa-window-close"></i></span>व्यवसाय बन्द बारे
        </a>
        </li>
        @endcan --}}

        {{-- @hasanyrole('super-admin|admin')
        <li class="nav-item {{ setActive('organization.unrenewed.index') }}">
        <a class="nav-link" href="{{ route('organization.unrenewed.index') }}">
            <span class="red-text"><i class="far fa-times-circle"></i></span>@lang('navigation.unrenewed')
        </a>
        </li>
        @endhasrole --}}

        {{-- @hasanyrole('super-admin|admin')
        <li class="nav-item {{ setActive('organization.report.index') }}">
        <a class="nav-link" href="{{ route('organization.report.index') }}">
            <span class="text-success"><i class="far fa-chart-bar"></i></span>@lang('navigation.report')
        </a>
        </li>
        @endhasrole --}}

        @can('user.*')
        <li class="nav-item {{ setActive('user.index') }} {{ setActive('user.create') }} {{ setActive('user.edit') }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <span class=""><i class="fa fa-users"></i></span>@lang('navigation.users')
            </a>
        </li>
        @endcan

        @hasanyrole('super-admin|admin')
        <li class="nav-item {{ setActive('settings.index') }}">
            <a class="nav-link" href="{{ route('settings.index') }}">
                <span class="amber-text"><i class="fas fa-cogs"></i></span>@lang('navigation.settings')
            </a>
        </li>
        @endhasrole

        {{-- @unlessrole('user')
        <li class="nav-item {{ setActive('user.settings.index') }}">
        <a class="nav-link" href="{{ route('user.settings.index') }}">
            <span class="text-info"><i class="fas fa-cog"></i></span>@lang('navigation.my_settings')
        </a>
        </li>
        @endunlessrole --}}

        {{-- @hasrole('super-admin')
        <li class="nav-item {{ request()->routeIs('organization.index') && request()->has('trashed') ? 'active' : '' }} }}">
        <a class="nav-link" href="{{ route('organization.index', ['trashed' => '1']) }}">
            <span class="text-danger"><i class="fas fa-trash-alt"></i></span> Trashed
        </a>
        </li>
        @endhasrole --}}

        <li class="nav-item">
            <a class="nav-link" href="#!">
                <span class="text-default"><i class="fas fa-tools"></i></span>@lang('navigation.configurations')</a>
        </li>
        @hasanyrole('super-admin|admin')
        <li class="nav-item pl-5 {{ setActive('fiscal-year.*') }}">
            <a class="nav-link" href="{{ route('fiscal-year.index') }}">@lang('navigation.fiscal_year')</a>
        </li>
        @endhasanyrole
        @can('province.*')
        <li class="nav-item pl-5 {{ setActive('province.*') }}">
            <a class="nav-link" href="{{ route('province.index') }}">@lang('navigation.province')</a>
        </li>
        @endcan
        @can('district.*')
        <li class="nav-item pl-5 {{ setActive('district.*') }}">
            <a class="nav-link" href="{{ route('district.index') }}">@lang('navigation.district')</a>
        </li>
        @endcan
        @can('municipality.*')
        <li class="nav-item pl-5 {{ setActive('municipality.*') }}">
            <a class="nav-link" href="{{ route('municipality.index') }}">@lang('navigation.municipality')</a>
        </li>
        @endcan
        @can('ward.*')
        <li class="nav-item pl-5 {{ setActive('ward.*') }}">
            <a class="nav-link" href="{{ route('ward.index') }}">@lang('navigation.ward')</a>
        </li>
        @endcan

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('local-population.index') }}">
                <span class="text-warning"><i class="fa fa-tachometer-alt"></i></span>@lang('navigation.local_population')
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('population.index') }}">
                <span class="text-warning"><i class="fa fa-tachometer-alt"></i></span>@lang('navigation.population')
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('age-population.index') }}">
                <span class="text-warning"><i class="fa fa-tachometer-alt"></i></span>@lang('navigation.age_population')
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('disability.index') }}">
                <span class="text-warning"><i class="fa fa-tachometer-alt"></i></span>@lang('navigation.disability')
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('disability-detail.index') }}">
                <span class="text-warning"><i class="fa fa-tachometer-alt"></i></span>@lang('navigation.disability_detail')
            </a>
        </li>

        @hasanyrole('super-admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logs') }}" target="_blank">
                <span class="text-info"><i class="fas fa-exclamation-triangle"></i></span>@lang('System Logs')
            </a>
        </li>
        @endhasanyrole
       

    </ul>
</div>
