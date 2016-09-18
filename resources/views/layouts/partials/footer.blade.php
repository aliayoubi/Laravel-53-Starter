<!-- Scripts -->
{!! Packer::js([
'/js/jquery.js',
'/css/plugins/materialize/js/materialize.min.js',
'/js/plugins/datatables/jquery.dataTables.min.js',
'/js/plugins/datatables/fnFilterOnReturn.js',
'/js/plugins/datatables/responsive/dataTables.responsive.min.js',
'/js/plugins/isMobile.min.js',
'/js/plugins/jquery.pulsate.min.js',
'/js/plugins/sweetalert/dist/sweetalert.min.js',
'/js/custom.js',
],
'/storage/cache/js/')
!!}

<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(window).load(function () {
        $('.loading-indicator-with-overlay').hide();
    });
</script>

@stack('scripts')

</body>
</html>