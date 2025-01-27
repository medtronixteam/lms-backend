<!DOCTYPE html>
<html lang="en">
@include('partials.admin.head')

<body>
    <div class="container-scroller">

    @include('partials.admin.header')
    <div class="container-fluid page-body-wrapper">
        @include('partials.admin.sidebar')
        @yield('content')
        {{@$slot}}
    </div>

    </div>
</body>
@include('partials.admin.scripts')
@include('flashy::message')
@stack('js')
</html>
