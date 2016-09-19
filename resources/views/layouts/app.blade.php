@include('layouts.partials.head')
<body>
@include('layouts.partials.nav')

<main>
<div class="container">
    <div class="section"></div>
    @yield('title')

    @include('flash::message')
    @include('sweet::alert')
    @include('shared.errors')
    @include('popups.loader')

    <div class="section"></div>

    @yield('content')
</div>
</main>

@include('layouts.partials.footer')
