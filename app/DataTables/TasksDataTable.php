<?php

namespace App\DataTables;

use App\Models\Task;
use Yajra\Datatables\Services\DataTable;

class TasksDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            //->addColumn('action', 'path.to.action.view')
            ->editColumn('action', function ($object) {
                $actions = '';

                $actions .= $this->listingMarkCompleteButton(route('task.complete', [$object->id]), $object->completed);
                $actions .= $this->listingEditButton(route('task.edit', [$object->id]));
                $actions .= $this->listingDeleteButton(route('task.destroy', [$object->id]), 'Task');

                return $actions;
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Task::where('user_id', auth()->user()->id)->latest();

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->addAction(['width' => '80px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'description',
            'completed',
            'created_at',
        ];
    }

    /**
     * Get default builder parameters.
     *
     * @return array
     */
    protected function getBuilderParameters()
    {
        return [
            'ordering' => config('custom.ordering'),
            'pageLength' => config('custom.pageLength'),
            'autoWidth' => config('custom.autoWidth'),
            'responsive' => true,
            'bLengthChange' => false,
            //'dom' => 'Bfrtip',
            //'order' => [[0, 'desc']],
            'buttons' => [],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tasksdatatables_' . time();
    }

    // make listing edit button
    protected function listingEditButton($link, $title = 'Edit')
    {
        $html = <<< HTML
    <a data-placement="top" data-tooltip data-original-title="$title" class="edit_btn" href="$link">
        <b class="btn btn-info btn-sm glyphicon glyphicon-pencil"></b>
    </a>
HTML;

        return $html;
    }


    // make listing delete button
    protected function listingDeleteButton($link, $title = 'this', $showTip = true)
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

    // complete status button
    protected function listingMarkCompleteButton($link, $status)
    {
        $title = $status == 0 ? 'Mark as complete' : 'Mark as un-complete';
        $type = $status == 0 ? 'default' : 'success';

        $html = <<< HTML
    <a data-placement="top" data-tooltip data-original-title="$title" title="$title" class="edit_btn" href="$link">
        <b class="btn btn-$type btn-sm glyphicon glyphicon-ok"></b>
    </a>
HTML;

        return $html;
    }
}
