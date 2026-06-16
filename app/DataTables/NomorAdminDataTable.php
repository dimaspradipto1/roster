<?php

namespace App\DataTables;

use App\Models\NomorAdmin;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NomorAdminDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<NomorAdmin> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('nama_admin', function ($nomorAdmin) {
                return e($nomorAdmin->nama_admin);
            })
            ->addColumn('no_wa', function ($nomorAdmin) {
                return e($nomorAdmin->no_wa);
            })
            ->addColumn('action', function ($nomorAdmin) {
                $btn  = '<div class="d-flex justify-content-center align-items-center" style="gap:5px">';

                // Tombol Edit
                $btn .= '<a href="' . route('nomoradmin.edit', $nomorAdmin->id) . '"
                            class="btn btn-sm btn-warning text-white"
                            style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                            title="Edit">
                            <i class="bi bi-pencil-fill" style="font-size:12px"></i>
                         </a>';

                // Tombol Hapus
                $btn .= '<form action="' . route('nomoradmin.destroy', $nomorAdmin->id) . '"
                              method="POST" class="m-0"
                              onsubmit="return confirm(\'Yakin ingin menghapus nomor admin ini?\')">'
                        . csrf_field() . method_field('DELETE')
                        . '<button type="submit"
                                   class="btn btn-sm btn-danger"
                                   style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                                   title="Hapus">
                            <i class="bi bi-trash-fill" style="font-size:12px"></i>
                           </button>
                         </form>';

                $btn .= '</div>';
                return $btn;
            })
            ->setRowId('DT_RowIndex')
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<NomorAdmin>
     */
    public function query(NomorAdmin $model): QueryBuilder
    {
        return $model->newQuery()->select(['id', 'nama_admin', 'no_wa']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('nomoradmin-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload'),
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('No')
                ->width('5%')
                ->addClass('text-center')
                ->searchable(false)
                ->orderable(false),
            Column::make('nama_admin')
                ->title('Nama Admin'),
            Column::make('no_wa')
                ->title('Nomor WhatsApp'),
            Column::computed('action')
                ->title('Aksi')
                ->exportable(false)
                ->printable(false)
                ->width('15%')
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'NomorAdmin_' . date('YmdHis');
    }
}
