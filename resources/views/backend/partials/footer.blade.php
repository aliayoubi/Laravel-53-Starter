<footer class="pull-left footer">
    <p class="col-md-12">
    <hr class="divider">
    Copyright &COPY; 2017 <a target="_blank" href="https://codeinphp.github.io/">Simple Bootstrap Admin</a>
    </p>
</footer>

<!-- Scripts -->
{!! Packer::js([
'/common/js/jquery.js',
'/backend/css/bootstrap/js/bootstrap.min.js',
'/common/js/plugins/datatables/jquery.dataTables.min.js',
'/common/js/plugins/datatables/datatables.bootstrap.js',
'/common/js/plugins/datatables/fnFilterOnReturn.js',
'/common/js/plugins/datatables/responsive/dataTables.responsive.min.js',
'/common/js/plugins/isMobile.min.js',
'/common/js/plugins/jquery.pulsate.min.js',
'/common/js/plugins/sweetalert/dist/sweetalert.min.js',
'/common/js/plugins/select2/select2.full.min.js',
'/backend/js/custom.js',
],
'/storage/backend/cache/js/')
!!}

@stack('scripts')

@include('sweet::alert')