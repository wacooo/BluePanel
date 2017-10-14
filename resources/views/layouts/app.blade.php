<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @stack('styles')
@include('partials.header')
</head>
<body>
    @include('partials.nav')

    <div class="container">
         @yield('content')
    </div>

    @include('partials.footer')

    <!-- Scripts -->
    @stack('scripts')

</body>
</html>
