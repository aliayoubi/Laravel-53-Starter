@include('backend/partials/head')
<body class="animated fadeIn">
@include('backend/partials/nav')

<div class="container-fluid main-container">
    @include('backend/partials/sidebar')

    <div class="col-md-10 content">
        <div class="panel panel-{{$errors->any() ? 'danger' : 'default'}}">
            <div class="panel-heading">
                <b class="fa fa-th-large"></b> @yield('title')
            </div>

            <div>{!! Breadcrumbs::render() !!}</div>

            <div class="panel-body">
            @include('flash::message')
            @include('shared.errors')
            @include('shared.loader')

            <!-- page content -->
                @yield('content')
            </div>
        </div>
    </div>

    @include('backend/partials/footer')

</div>
</body>
</html>
