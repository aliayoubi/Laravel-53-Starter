/**
 * Created by Sarfraz on 10/18/2016.
 *
 * Custom Javascript for the app.
 *
 */

$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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

    // select 2 for dropdowns
    var $select2 = $('select').select2();
    $select2.length && $select2.data('select2').$container.addClass('wrap');

    $('.pulsate').pulsate();

    // BTS Popover
    $('[rel="popover"]').addClass('text-primary').popover({"trigger": "hover", "html": true});

    // to close popover when clicking outside
    $('body').on('click', function (e) {
        $('[rel="popover"]').each(function () {
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });

    // BTS Tooltips
    if (!isMobile.any) {
        $('[data-tooltip]').tooltip();
    }

    // this event is called when datatable is drawn
    $dataTable.on('draw.dt', function () {
        // BTS Popover
        $('[rel="popover"]').addClass('text-primary').popover({"trigger": "click", "html": true});
        // BTS Tooltips
        $('[data-tooltip]').tooltip();

        // center elements with classs "center" inside tables
        $('.tdcenter').each(function () {
            $(this).parent().addClass('text-center');
        });
    });

    // move any bt models outside of tables if they are in them otherwise they don't show up
    $('.move_modal').each(function () {
        $(this).appendTo(document.body);
    });

    // activate last active tab
    if (typeof selected_tab !== 'undefined') {
        var activeTab = $('[href=' + selected_tab + ']');
        activeTab && activeTab.tab('show');
    }
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
