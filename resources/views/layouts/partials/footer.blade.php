<footer class="footer">
    <div class="container">
        <p class="text-muted">&copy; {{date('Y')}} <a href="/">{{config('app.name')}}</a> - All rights reserved.</p>
    </div>
</footer>

<!-- Scripts -->
{!! Packer::js([
'/js/jquery.js',
'/css/plugins/bootstrap/js/bootstrap.min.js',
'/css/plugins/material-design/material.min.js',
'/css/plugins/material-design/ripples.min.js',
'/js/plugins/datatables/jquery.dataTables.min.js',
'/js/plugins/datatables/datatables.bootstrap.js',
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