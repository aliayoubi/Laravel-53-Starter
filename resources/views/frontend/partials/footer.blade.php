<div class="clearfix">&nbsp;</div>
<footer class="footer">
    <div class="container">
        <p class="text-muted">&copy; {{date('Y')}} <a href="/">{{config('app.name')}}</a> - All rights reserved.</p>
    </div>
</footer>

<!-- Scripts -->
{!! Packer::js([
'/common/js/jquery.js',
'/frontend/css/bootstrap/js/bootstrap.min.js',
'/common/js/plugins/datatables/jquery.dataTables.min.js',
'/common/js/plugins/datatables/datatables.bootstrap.js',
'/common/js/plugins/datatables/fnFilterOnReturn.js',
'/common/js/plugins/datatables/responsive/dataTables.responsive.min.js',
'/common/js/plugins/isMobile.min.js',
'/common/js/plugins/jquery.pulsate.min.js',
'/common/js/plugins/sweetalert/dist/sweetalert.min.js',
'/common/js/plugins/select2/select2.full.min.js',
'/frontend/js/custom.js',
],
'/storage/frontend/cache/js/')
!!}

@stack('scripts')

@include('sweet::alert')

</body>
</html>