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
    @stack('styles')
    <style>
        #login-link {
            color: #039be5;
            background-color: #daf1fd;
            border: 1px solid #74d1f5;
        }

        #login-link:hover {
            background-color: #bbe3f7;
            color: #32627b;
        }

    </style>

</head>
<body>
    <div class="container py-2 d-flex font-roboto">
        <div class="d-flex">
            <div class="mr-2">
                <img src="{{ asset(config('constants.nep_gov.logo_sm')) }}" alt="" style="max-height: 90px;">
            </div>
            <div class="d-flex flex-column align-self-center">
                <h4 class="h4-responsive text-danger font-weight-bold">Ghodaghodi Municipality</h4>
                <h5 class="h5-responsive mdb-color-text">Government of Nepal</h5>
            </div>
        </div>
        <div class="ml-auto align-self-center">
            @guest
            <a id="login-link" class="py-2 px-3 rounded font-noto" href="{{ route('login') }}" onmouseove>Login</a>
            @endguest
        </div>
    </div>

    @yield('content')

    @include('layouts.partials.scripts')

    <script>
        /**
         * Search dropdown options
         * @param searchTerm
         * @param targets
         * @param dataKey as data-keys
         * @usage filterOptions(10, '#select-district-id option', 'province-id');
         */
        function filterOptions(searchTerm, targets, dataKey) {
            // console.log('Filtering with data-key: ' + dataKey + ' search term: '+ searchTerm);
            $(targets).each(function() {
                if ($(this).data(dataKey) == searchTerm) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $(function() {
            $('[data-toggle="tooltip"]').tooltip();

            if ($('.nepali-date')[0]) {
                $('.nepali-date').nepaliDatePicker({
                    disableDaysAfter: 1,
                    ndpYear: true,
                    ndpMonth: true,
                    ndpYearCount: 10
                });
            }

            var today = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate('YYYY-MM-DD'), 'YYYY-MM-DD');
            $(".date-today[value='']").val(today);

        });

    </script>
    @stack('scripts')
</body>
</html>
