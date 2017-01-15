<?php
/**
 * Created by PhpStorm.
 * User: Sarfraz
 * Date: 1/15/2017
 * Time: 3:35 PM
 */

// make listing edit button
function listingEditButton($link, $title = 'Edit')
{
    $html = <<< HTML
    <a data-placement="top" data-tooltip data-original-title="$title" class="edit_btn" href="$link">
        <b class="btn btn-primary btn-sm glyphicon glyphicon-pencil"></b>
    </a>
HTML;

    return $html;
}


// make listing delete button
function listingDeleteButton($link, $title = 'this', $showTip = true)
{
    $tooltipClass = $showTip ? 'data-tooltip' : '';

    $html = <<< HTML
    <a data-placement="top" $tooltipClass data-original-title="Delete" class="delete_btn confirm-delete"
    data-label="$title"
    rel="$link"
    href="javascript:void(0);">
        <b class="btn btn-danger btn-sm glyphicon glyphicon-trash"></b>
    </a>
HTML;

    return $html;
}