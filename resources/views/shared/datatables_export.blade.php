@push('styles')
<link href="/plugins/datatables/buttons/css/buttons.dataTables.min.css" rel="stylesheet"/>
@endpush

@push('scripts')
{!! Packer::js([
'/plugins/datatables/buttons/js/dataTables.buttons.min.js',
'/plugins/datatables/buttons/js/buttons.bootstrap.min.js',
'/plugins/datatables/buttons/js/buttons.server-side.js',
],
'/storage/cache/js/')
!!}

{!! $dataTable->scripts() !!}
@endpush