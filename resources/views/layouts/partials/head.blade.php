<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/favicon.ico">

    <title>{{config('app.name')}}</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {!! Packer::css([
    '/css/plugins/materialize/css/materialize.min.css',
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