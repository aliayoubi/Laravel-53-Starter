<?php

namespace App\DataTables;

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
                $actions .= listingEditButton(route('task.edit', [$object->id]));
                $actions .= listingDeleteButton(route('task.destroy', [$object->id]), 'Task');

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
        $query = auth()->user()->tasks()->latest();

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
