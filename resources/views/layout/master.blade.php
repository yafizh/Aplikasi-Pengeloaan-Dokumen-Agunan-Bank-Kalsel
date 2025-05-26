<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Pengelolaan Dokumen Agunan</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- plugin css -->
    <link rel="stylesheet" href="/assets/plugins/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
    <!-- end plugin css -->

    @stack('plugin-styles')

    <!-- common css -->
    <link rel="stylesheet" href="/css/app.css">
    <!-- end common css -->

    <style>
        textarea {
            padding: 1rem !important;
        }

        .form-control {
            padding: 0 1rem;
        }

        * {
            line-height: 1.2 !important;
        }
    </style>
    @stack('style')
</head>

<body data-base-url="{{ url('/') }}">

    <div class="container-scroller" id="app">
        @include('layout.header')
        <div class="container-fluid page-body-wrapper">
            @include('layout.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                @include('layout.footer')
            </div>
        </div>
    </div>

    <!-- base js -->
    <script src="/js/app.js"></script>
    <script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- end base js -->

    <!-- common js -->
    <script src="/assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/js/misc.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/todolist.js"></script>
    <!-- end common js -->

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    <script>
        new DataTable('#example', {
            language: {
                emptyTable: 'Data Tidak Ada'
            }
        });
    </script>
</body>

</html>
