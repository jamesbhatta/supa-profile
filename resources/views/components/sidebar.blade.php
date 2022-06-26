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

        {{-- <li class="nav-item {{ setActive('resources.*') }}">
            <a class="nav-link" href="{{ route('resources.index') }}">
                <span class="text-warning"><i class="fa fa-cogs"></i></span>Resources
            </a>
        </li> --}}

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

        {{-- ============Unit 1=========== --}}
        <li class="nav-item">
            <a href="#unit1" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fas fa-tools"></i></span>भौगोलिक तथा राजनीतिक अवस्था</a>
            <ul class="list-unstyled collapse" id="unit1" style="">
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('land-uses.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span> भू – उपयोगको अवस्था
                    </a>
                </li>
                @hasanyrole('super-admin|admin')
                    <li class="nav-item sub-nav">
                        <a class="nav-link" href="{{ route('current-ministry.index') }}"><span class="mx-3"><i
                                    class="fas fa-circle"></i></span>हालको मन्त्रिपरिषद्</a>
                    </li>
                @endhasanyrole

                @hasanyrole('super-admin|admin')
                    <li class="nav-item sub-nav">
                        <a class="nav-link" href="{{ route('province-head.index') }}"><span class="mx-3"><i
                                    class="fas fa-circle"></i></span>प्रदेश प्रमुखहरु</a>
                    </li>
                @endhasanyrole

                @hasanyrole('super-admin|admin')
                    <li class="nav-item sub-nav">
                        <a class="nav-link" href="{{ route('assembly-member.index') }}"><span class="mx-3"><i
                                    class="fas fa-circle"></i></span>प्रदेश सभा सदस्यहरु</a>
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
                        <a class="nav-link" href="{{ route('municipality.index') }}"><span class="mx-3"><i
                                    class="fas fa-circle"></i></span>@lang('navigation.municipality')</a>
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
                {{-- <li class="nav-item sub-nav">
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
                </li> --}}
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
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('elecricity-generate.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>विधुत उत्पादन
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('telecomunication.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>सञ्चार सेवा उपभोगकर्ता
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('news-paper.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>पत्रपत्रिका
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('radio.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>एफएम रेडियो
                    </a>
                </li>

            </ul>
        </li>

        {{-- ==========unit 6============ --}}
        <li class="nav-item">
            <a href="#business" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fas fa-users"></i></span>उद्योग ब्यवसाय</a>
            <ul class="list-unstyled collapse" id="business" style="">
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('province-business.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>ठूला तथा मझौला उद्योग
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('supa-business.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span> कूल साना उद्योग
                    </a>
                </li>

            </ul>
        </li>

        {{-- ==========unit 7============ --}}
        <li class="nav-item">
            <a href="#agriculture" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fas fa-users"></i></span>कृषि क्षेत्र</a>
            <ul class="list-unstyled collapse" id="agriculture" style="">
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('ownership.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span>भू – स्वामित्वको अवस्था
                    </a>
                </li>
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('land-uses.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span> भू – उपयोगको अवस्था
                    </a>
                </li>

                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('agriculture-produce.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span> कृषि उपजले ढाकेको  क्षेत्र
                    </a>
                </li>

                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('irrigation.index') }}">
                        <span class="mx-3"><i class="fa fa-circle"></i></span> जिल्लागत क्सिंचाई स्थिति
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
