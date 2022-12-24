<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <link href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/jqueryui/jquery-ui.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/jqueryui/thems/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/jqueryui/thems/themes/base/jquery-ui.min.css') }}" rel="stylesheet" />
    <style>
        input,
        td,
        th {
            text-align: center;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.bootstrapnavigation')


        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="{{ asset('assets/jqueryui/external/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/jqueryui/jquery-ui.min.js') }}"></script>
    <script>
        $(document).ready(() => {
            $("#tabs").tabs();
            $("#optabs").tabs();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function sellamount(type, pid) {
            switch (type) {
                case 'karton':
                    amount = $("#karton").val();
                    break;
                case 'darzan':
                    amount = $("#darzan").val();
                    break;
                case 'newdarzan':
                    amount = $("#newdarzan").val();
                    break;
                default:
                    amount = $("#dana").val();
                    break;
            }
            if (amount <= 0 || amount == "") {
                alert("{{ __('en.pleaseselectamount') }}");
                return;

            }
            $.post("{{ route('product.sell') }}", {
                "pid": pid,
                "type": type,
                "amount": amount,
            }).done(() => {
                alert("{{ __('en.success') }}");
            }).fail(() => {
                alert("{{ __('en.fail') }}");
            });
        }

        function buyamount(type, pid) {
            switch (type) {
                case 'karton':
                    amount = $("#karton").val();
                    break;
                case 'darzan':
                    amount = $("#darzan").val();
                    break;
                case 'newdarzan':
                    amount = $("#newdarzan").val();
                    break;
                default:
                    amount = $("#dana").val();
                    break;
            }
            if (amount <= 0 || amount == "") {
                alert("{{ __('en.pleaseselectamount') }}");
                return;

            }
            $.post("{{ route('product.buy') }}", {
                "pid": pid,
                "type": type,
                "amount": amount,

            }).done(() => {
                alert("{{ __('en.success') }}");
            }).fail(() => {
                alert("{{ __('en.fail') }}");
            });
        }

        function saveproducts() {
            let name = $("#pname").val();
            let note = $("#pnote").val();

            let sellkartonprice = $("#sellkartonprice").val();
            let selldarzanprice = $("#selldarzanprice").val();
            let sellnewdarzanprice = $("#sellnewdarzanprice").val();
            let selldanaprice = $("#selldanaprice").val();

            if (name.length < 1 || name.length > 75) {
                return;
            }
            if (note.length > 150) {
                return;
            }



            $.post("{{ route('product.insert') }}", {
                "name": name,
                "note": note,
                "sellkartonprice": sellkartonprice,
                "selldarzanprice": selldarzanprice,
                "sellnewdarzanprice": sellnewdarzanprice,
                "selldanaprice": selldanaprice,


            }).done(() => {
                alert("{{ __('en.success') }}");
            }).fail(() => {
                alert("{{ __('en.fail') }}");
            });

        }
    </script>
</body>

</html>
