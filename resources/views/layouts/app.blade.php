@include('layouts/partials/head')
<body>
@include('layouts/partials/nav')

<div class="mainbody container">
    <div class="page-header text-center">
        <h1 class="badge">@yield('title')</h1>
    </div>

    @include('flash::message')
    @include('shared.errors')
    @include('sweet::alert')

    <div class="clearfix">&nbsp;</div>

    @yield('content')

    @include('shared.loader')
</div>

@include('layouts/partials/footer')
