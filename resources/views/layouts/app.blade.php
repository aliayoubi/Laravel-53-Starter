@include('layouts/partials/head')
<body>
@include('layouts/partials/nav')

<div class="mainbody container">
    <div class="navigations">
        <div class="pull-left">
            <div class="page-header text-center">
                <h1 class="badge"><i class="fa fa-th-large"></i> @yield('title')</h1>
            </div>
        </div>

        @if (Auth::check())
            <div class="pull-right">{!! Breadcrumbs::render() !!}</div>
        @endif

        <div class="clearfix"></div>
    </div>

    @include('flash::message')
    @include('shared.errors')
    @include('sweet::alert')
    @include('shared.loader')

    @yield('content')
</div>


@include('layouts/partials/footer')
