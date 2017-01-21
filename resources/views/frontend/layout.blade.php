@include('frontend/partials/head')
<body class="animated fadeIn">
@include('frontend/partials/nav')

<div class="container main">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-{{$errors->any() ? 'danger' : 'default'}} mainbody">
                <div class="panel-heading page-header">
                    <h1><i class="fa fa-th-large"></i> @yield('title')</h1>
                </div>

                @if (Auth::check())
                    <div>{!! Breadcrumbs::render() !!}</div>
                @endif

                <div class="panel-body main-content">
                    @include('flash::message')
                    @include('shared.errors')
                    @include('shared.loader')

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend/partials/footer')
