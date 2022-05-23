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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        @page {
            /* size: auto; */
            /* auto is the initial value */
            /* this affects the margin in the printer settings */
            /* margin: 15mm 15mm 15mm 15mm; */
        }

        body {
            background-color: #fff;

            font-size: <?php echo settings('letter_font_size', 24) . 'pt' ?>;
        }

        @media print {
            .noprint {
                display: none;
            }

            .table th,
            .table td {
                border: 2px solid #000 !important;
                -webkit-print-color-adjust: exact;
            }
        }

        /* Resizable */
        .resizable-block.resize-enabled .resizable {
            resize: both;
            overflow: visible;
            border: 1px dashed #e73b55;
        }

        .ui-resizable-e,
        .ui-resizable-w,
        .ui-resizable-n,
        .ui-resizable-s {
            width: 8px;
            height: 8px;
            background-color: yellow;
            border: 1px solid red;
            border-radius: 50%;
        }

        .ui-resizable-n {
            top: -5px;
            left: 50%;
        }

        .ui-resizable-w {
            left: -5px;
            top: 50%;
        }

        .ui-resizable-e {
            right: -5px;
            top: 50%;
        }

        .ui-resizable-s {
            bottom: -5px;
            left: 50%;
        }

    </style>
    @stack('styles')
    {!! settings('letter_head_scripts') !!}

</head>
<body>
    <div class="container">
        <div id="options-bar" class="card grey lighten-5 border my-4 noprint">
            <div class="card-body d-flex justify-content-between">
                <button class="btn btn-danger btn-md z-depth-0" onclick="window.close()">Cancel</button>
                <button class="btn btn-success btn-md z-depth-0" id="enable-resize-btn" onclick="enableResizable()">Enable Resize Mode</button>
                <button class="btn btn-success btn-md z-depth-0 d-none" id="disable-resize-btn" onclick="disableResizable()">Disable Resize Mode</button>
                <button class="btn btn-primary btn-md z-depth-0" onclick="printDocument()">Print</button>
            </div>
        </div>

        <div id="document-wrapper" contenteditable="{{ $contentEditable ??  'true'}}">
            @yield('content')
        </div>
    </div>

    @include('layouts.partials.scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        var today = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate('YYYY-MM-DD'), 'YYYY/MM/DD');
        var nepaliDates = document.getElementsByClassName('nepali-date-today');
        // for (let i = 0; i <= nepaliDates.length; i++) {
        //     nepaliDates[i].innerHTML = today;
        // }
        nepaliDates.forEach(function(element) {
            element.innerHTML = today
        })

        function printDocument() {
            var optionsBar = document.getElementById('options-bar');
            var prtContent = document.getElementById("document-wrapper");
            optionsBar.classList.add('d-none');
            window.print();
            optionsBar.classList.remove('d-none');
        }

        function enableResizable() {
            let resizableBlocks = document.getElementsByClassName('resizable-block');
            resizableBlocks.forEach(element => {
                element.classList.add('resize-enabled');
            });
            $(".resize-enabled .resizable").resizable({
                handles: "n, e, s, w"
            , });
            document.getElementById('enable-resize-btn').classList.add('d-none');
            document.getElementById('disable-resize-btn').classList.remove('d-none');
        }

        function disableResizable() {
            let resizableBlocks = document.getElementsByClassName('resizable-block');
            resizableBlocks.forEach(element => {
                element.classList.remove('resize-enabled');
            });
            $(".resizable").resizable("destroy");
            document.getElementById('disable-resize-btn').classList.add('d-none');
            document.getElementById('enable-resize-btn').classList.remove('d-none');
        }

    </script>
</body>
</html>
