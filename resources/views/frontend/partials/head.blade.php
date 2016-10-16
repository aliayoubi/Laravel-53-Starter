<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <!-- The above 3 meta tags *must* come first in the head -->
    <meta name="description" content="{{config('app.name')}}">
    <meta name="author" content="Sarfraz Ahmed">
    <link rel="shortcut icon" href="/favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    {!! Packer::css([
    '/frontend/css/bootstrap/css/bootstrap.min.css',
    '/frontend/css/bootstrap/css/custom.css',
    '/common/css/font-awesome-4/css/font-awesome.min.css',
    '/common/css/checkbox3.min.css',
    '/common/js/plugins/datatables/datatables.bootstrap.css',
    '/common/js/plugins/datatables/responsive/responsive.dataTables.min.css',
    '/common/js/plugins/sweetalert/dist/sweetalert.css',
    '/common/js/plugins/select2/select2.min.css',
    '/common/css/loader.css',
    '/frontend/css/custom.css',
    ],
    '/storage/frontend/cache/css/')
    !!}

    <link rel="stylesheet" href="/common/css/animate.css">

    @stack('styles')

    <script>
        window.Laravel = <?=json_encode(['csrfToken' => csrf_token()]); ?>
    </script>
</head>