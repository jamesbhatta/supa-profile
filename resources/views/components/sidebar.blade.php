<div class="py-4 pl-5">
    <img class="img-reponsive" src="{{ asset(config('constants.nep_gov.logo_sm')) }}" alt="Nepal Government Logo"
        height="80px">
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
            <li
                class="nav-item {{ setActive('user.index') }} {{ setActive('user.create') }} {{ setActive('user.edit') }}">
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

        {{-- ============Unit 1=========== --}}
        <li class="nav-item">
            <a href="#unit1" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fas fa-tools"></i></span>भौगोलिक तथा राजनीतिक अवस्था</a>
            <ul class="list-unstyled collapse" id="unit1" style="">
                @hasanyrole('super-admin|admin')
                    <li class="nav-item sub-nav">
                        <a class="nav-link" href="{{ route('current-ministry.index') }}"><span
                                class="mx-3"><i class="fas fa-circle"></i></span>हालको मन्त्रिपरिषद्</a>
                    </li>
                @endhasanyrole

                @hasanyrole('super-admin|admin')
                    <li class="nav-item sub-nav">
                        <a class="nav-link" href="{{ route('province-head.index') }}"><span
                                class="mx-3"><i class="fas fa-circle"></i></span>प्रदेश प्रमुखहरु</a>
                    </li>
                @endhasanyrole

                @hasanyrole('super-admin|admin')
                    <li class="nav-item sub-nav">
                        <a class="nav-link" href="{{ route('assembly-member.index') }}"><span
                                class="mx-3"><i class="fas fa-circle"></i></span>प्रदेश सभा सदस्यहरु</a>
                    </li>
                @endhasanyrole

            </ul>
        </li>

        {{-- ============configrations=========== --}}
        <li class="nav-item">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fas fa-tools"></i></span>@lang('navigation.configurations')</a>
            <ul class="list-unstyled collapse" id="homeSubmenu" style="">
                @hasanyrole('super-admin|admin')
                    <li class="nav-item sub-nav">
                        <a class="nav-link" href="{{ route('fiscal-year.index') }}"><span class="mx-3"><i
                                    class="fas fa-circle"></i></span>@lang('navigation.fiscal_year')</a>
                    </li>
                @endhasanyrole
                @can('province.*')
                    <li class="nav-item sub-nav {{ setActive('province.*') }}">
                        <a class="nav-link " href="{{ route('province.index') }}"><span class="mx-3"><i
                                    class="fas fa-circle"></i></span>@lang('navigation.province')</a>
                    </li>
                @endcan
                @can('district.*')
                    <li class="nav-item sub-nav {{ setActive('district.*') }}">
                        <a class="nav-link" href="{{ route('district.index') }}"><span class="mx-3"><i
                                    class="fas fa-circle"></i></span>@lang('navigation.district')</a>
                    </li>
                @endcan
                @can('municipality.*')
                    <li class="nav-item sub-nav {{ setActive('municipality.*') }}">
                        <a class="nav-link" href="{{ route('municipality.index') }}"><span
                                class="mx-3"><i class="fas fa-circle"></i></span>@lang('navigation.municipality')</a>
                    </li>
                @endcan
                @can('ward.*')
                    <li class="nav-item sub-nav {{ setActive('ward.*') }}">
                        <a class="nav-link" href="{{ route('ward.index') }}"> <span class="mx-3"><i
                                    class="fas fa-circle"></i></span> @lang('navigation.ward')</a>
                    </li>
                @endcan

            </ul>
        </li>

        {{-- ==========populations============ --}}
        <li class="nav-item">
            <a href="#population" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fas fa-users"></i></span>@lang('navigation.populations')</a>
            <ul class="list-unstyled collapse" id="population" style="">
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('geographical-population.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>भौगोलिक क्षेत्रगत जनसंख्या
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('local-population.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.local_population')
                    </a>
                </li>

                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('population.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.population')
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('age-population.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.age_population')
                    </a>
                </li>
            </ul>
        </li>

         {{-- ==========unit 3============ --}}
         <li class="nav-item">
            <a href="#economiccondition" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fas fa-users"></i></span>आर्थिक अवस्था</a>
            <ul class="list-unstyled collapse" id="economiccondition" style="">
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('economic-indicator.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>आर्थिक सूचकहरु
                    </a>
                </li>

                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('revenue-sharing.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>राजश्व बाँडफाँड
                    </a>
                </li>

                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('revenue.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>राजश्वको विवरण
                    </a>
                </li>

                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('budget-resource.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>बजेट स्रोतको अवस्था
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('total-budget.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>कूल बजेट र खर्च
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('employeement-status.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>रोजगारको अवस्था
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('cooperative.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>सहकारीहरुको विवरण
                    </a>
                </li>
               
            </ul>
        </li>

         {{-- ==========unit 4============ --}}
         <li class="nav-item">
            <a href="#socialDevelopment" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fas fa-users"></i></span>सामाजिक विकास</a>
            <ul class="list-unstyled collapse" id="socialDevelopment" style="">
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('total-student.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span> कूल विद्यार्थी संख्या
                    </a>
                </li>

                
            </ul>
        </li>

        {{-- ==========unit 5============ --}}
        <li class="nav-item">
            <a href="#infrastructure" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fas fa-users"></i></span>पूर्वाधार विकास</a>
            <ul class="list-unstyled collapse" id="infrastructure" style="">
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('proud-project.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>गौरबका आयोजाहरु
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('road-network.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>सडक सञ्जाल
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('province-road.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>प्रदेश र स्थानीय तहको सडक
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('province-road-type.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>सडकको प्रकार विवरण
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('airport.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>विमानस्थल
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('electricity-access.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>विधुत पहुँच
                    </a>
                </li>
                
            </ul>
        </li>

        {{-- ============Disability============ --}}

        <li class="nav-item">
            <a href="#disability" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fas fa-wheelchair"></i></span>@lang('navigation.disability')</a>
            <ul class="list-unstyled collapse" id="disability" style="">
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('disability.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.disability_type')
                    </a>
                </li>

                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('disability-detail.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.disability_detail')
                    </a>
                </li>
                

            </ul>
        </li>

        {{-- ===============Bank============== --}}

        <li class="nav-item">
            <a href="#bank" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fa fa-home"></i></span>@lang('navigation.bank')</a>
            <ul class="list-unstyled collapse" id="bank" style="">
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('bank-detail.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.bank_detail')
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('bank.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.banks')
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('local-bank.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.local_bank')
                    </a>
                </li>
            </ul>
        </li>

        {{-- =============+School=========== --}}

        <li class="nav-item">
            <a href="#school" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fa fa-school"></i></span>@lang('navigation.school')</a>
            <ul class="list-unstyled collapse" id="school" style="">
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('school.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.school_detail')
                    </a>
                </li>

                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('feeder-hostel.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.feeder_hostel')
                    </a>
                </li>

                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('kamlari-hostel.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.kamlari_hostel')
                    </a>
                </li>

                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('goverment-student.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>@lang('navigation.goverment_student')
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('info-card.create') }}">
                <span class="text-warning"><i class="fa fa-id-card" aria-hidden="true"></i>
                </span>@lang('navigation.card_info')
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
