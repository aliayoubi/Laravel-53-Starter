<div class="clearfix">&nbsp;</div>
<footer class="footer">
    <div class="container">
        <p class="text-muted">&copy; {{date('Y')}} <a href="/">{{config('app.name')}}</a> - All rights reserved.</p>
    </div>
</footer>

<!-- Scripts -->
{!! Packer::js([
'/js/jquery.js',
'/css/plugins/bootstrap/js/bootstrap.min.js',
'/js/plugins/datatables/jquery.dataTables.min.js',
'/js/plugins/datatables/datatables.bootstrap.js',
'/js/plugins/datatables/fnFilterOnReturn.js',
'/js/plugins/datatables/responsive/dataTables.responsive.min.js',
'/js/plugins/isMobile.min.js',
'/js/plugins/jquery.pulsate.min.js',
'/js/plugins/sweetalert/dist/sweetalert.min.js',
'/js/plugins/select2/select2.full.min.js',
'/js/custom.js',
],
'/storage/cache/js/')
!!}

@stack('scripts')

@include('sweet::alert')

</body>
</html>