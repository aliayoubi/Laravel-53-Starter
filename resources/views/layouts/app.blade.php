@include('layouts.partials.head')
<body>
@include('layouts.partials.nav')

<div class="container">
    @include('flash::message')
    @include('sweet::alert')
    @include('shared.errors')
    @include('popups.loader')

    <div class="section"></div>

    @yield('content')
</div>

@include('layouts.partials.footer')
