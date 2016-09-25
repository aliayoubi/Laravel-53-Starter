<?php

namespace App\DataTables;

use App\Presenters\TaskPresenter;
use App\Repositories\TaskRepository;
use Yajra\Datatables\Services\DataTable;

class TasksDataTable extends DataTable
{
    // our repository to be used in this DataTable
    protected $repository = TaskRepository::class;

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->of($this->query())
            //->addColumn('action', 'path.to.action.view')
            ->editColumn('completed', function ($object) {
                $presentedTask = present($object, TaskPresenter::class);

                return $presentedTask->completed;
            })
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
        $query = (new $this->repository)->findWhere(['user_id', auth()->user()->id]);

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
            'completed' => ['width' => '1px'], // auto-width to content
            'created_at' => ['width' => '180px'],
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
