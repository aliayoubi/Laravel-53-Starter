/**
 * Created by Sarfraz on 9/18/2016.
 *
 * Custom Javascript for the app.
 *
 */

$(function () {

    // hide loader
    $('.loading-indicator-with-overlay').hide();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.material.init();

    var $dataTable = $('.dataTable');

    // avoid onkeyup search in datatables filter, use Enter button instead
    if (!isMobile.any) {
        $dataTable.dataTable().fnFilterOnReturn();
    }

    // throw datatables errors to console instead of alert box
    $.fn.dataTable.ext.errMode = 'throw';

    // this event is called when datatable is drawn
    $dataTable.on('draw.dt', function () {
        // whatever....
    });

    $('.pulsate').pulsate();

});


// confirm delete
$('body').on('click', '.confirm-delete', function (e) {
    var label = $(this).data('label');
    var $dialog = $('#modal-delete-confirm');

    $dialog.find('.modal-body').html('You are about to delete <strong>' + label + '</strong>, continue ?');
    $dialog.find('form').attr('action', this.rel);
    $dialog.modal('show');

    e.preventDefault();
});

// replace alert with sweet alert
function alert(message, type, closeOnEscapeKey, callback) {
    type = type || '';

    if (typeof closeOnEscapeKey === 'undefined') {
        closeOnEscapeKey = true;
    }

    swal({
        title: "Important",
        text: message,
        type: type,
        html: true,
        allowEscapeKey: closeOnEscapeKey
    });

    if (typeof callback !== 'undefined' && typeof callback === 'function') {
        callback();
    }

}
