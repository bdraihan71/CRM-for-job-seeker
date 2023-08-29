<!DOCTYPE html>

<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Aug 2023 13:52:14 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application Management | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min2167.css?v=3.2.0') }}">
    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- navbar --}}
        @include('backend.partials.navbar')

        {{-- sidebar --}}
        @include('backend.partials.sidebar')

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('page_title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content">
                <div class="container-fluid">
                    {{-- main content --}}
                    @yield('content')
                </div>
            </div>

        </div>


        <aside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


        {{-- footer --}}
        @include('backend.partials.footer')
    </div>



    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('backend/dist/js/adminlte.min2167.js?v=3.2.0') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @include('backend.partials.toastr')
    
    @stack('scripts')
</body>

<!-- Mirrored from adminlte.io/themes/v3/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Aug 2023 13:52:14 GMT -->

</html>
