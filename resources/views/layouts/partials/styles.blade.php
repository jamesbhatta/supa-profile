<link rel="icon" href="{{ asset(config('constants.nep_gov.logo_sm')) }}">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<link href="{{ asset('assets/mdb/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/mdb/css/mdb.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/mystyle.css') }}" rel="stylesheet">
<style>
    @font-face {
        font-family: Kalimati;
        src: url("{{ asset('assets/fonts/Kalimati.ttf') }}") format('truetype');
    }

    .unicode-font {
        /* font-family: 'noto'; */
    }

    .sub-nav {
        background-color: #12213a;
        ;
    }

    .card-icon {
        position: relative;
        top: 15px;

    }

    .table-list li{
        position: relative;
        top: 10px;
    }
    .table-list li a{
        color: #000;
    }
    .list-set{
        /* box-shadow: 1px 1px 5px 10px gray;    */
        background-color: #fff;
        padding: 10px;
    }
    .table-list li a:hover{
        color: blue;
    }
    .cards-footer {
        background-color: rgba(255, 255, 255, 0.5);

    }

    .cards-footer label {
        cursor: pointer;
    }
    .side-client-menus div{
        position:sticky;top: 0;
    } 

    /* style="width: 60vw;margin-left:-200px;"
     */
    .dashboard-container {
        width: 60vw;
    }

    @media only screen and (max-width:991px) {

        .side-client-menus {
            display: none;
        }
    }

    @media only screen and (max-width:2000px) {

        .side-client-menus {
            min-width: 330px;
        }
    }
    .breadcrumb{
        background: #fff
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
