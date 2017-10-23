<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('partials.admin.head')

    @stack('styles')
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        @include('partials.admin.header')
    </header>
    <aside class="main-sidebar">
        @include('partials.admin.nav')
    </aside>
    <div class="content-wrapper">
        <section class="content-header">
            @yield('content-header')
        </section>

        <section class="content">
            @yield('content')
        </section>
    </div>



</div>
@include('partials.admin.footer')
<!-- Scripts -->
@stack('scripts')

</body>
</html>
