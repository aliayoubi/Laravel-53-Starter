<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <!-- The above 3 meta tags *must* come first in the head -->
    <meta name="description" content="{{config('app.name')}}">
    <meta name="author" content="{{config('app.name')}}">
    <link rel="shortcut icon" href="/favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    {!! Packer::css([
    '/css/plugins/bootstrap/css/bootstrap.min.css',
    '/css/plugins/material-design/bootstrap-material-design.min.css',
    '/css/plugins/material-design/ripples.min.css',
    '/css/plugins/font-awesome-4/css/font-awesome.min.css',
    '/js/plugins/datatables/datatables.bootstrap.css',
    '/js/plugins/datatables/responsive/responsive.dataTables.min.css',
    '/js/plugins/sweetalert/dist/sweetalert.css',
    '/css/custom.css',
    ],
    '/storage/cache/css/')
    !!}

    <link rel="stylesheet" href="/css/plugins/animate.css">

    @stack('styles')

    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
    </script>
</head>