<link rel="icon" href="{{ asset(config('constants.nep_gov.logo_sm')) }}">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<link href="{{ asset('assets/mdb/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/mdb/css/mdb.min.css') }}" rel="stylesheet">
<style>
    @font-face {
        font-family: Kalimati;
        src: url("{{ asset('assets/fonts/Kalimati.ttf') }}") format('truetype');
    }

    .unicode-font {
        /* font-family: 'noto'; */
    }

</style>
<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/utilities.css') }}">
<link href="{{ asset('assets/mdb/css/addons/datatables.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/nepali.datepicker.v3.min.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
@guest
<link rel="stylesheet" href="{{ asset('assets/css/guest.css') }}">
@endguest
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
