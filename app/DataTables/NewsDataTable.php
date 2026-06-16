<?php

namespace App\DataTables;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<News> $query
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('thumbnail', function ($news) {
                if ($news->thumbnail) {
                    return '<img src="' . asset('storage/' . $news->thumbnail) . '"
                                 alt="' . e($news->title) . '"
                                 style="width:70px;height:45px;object-fit:cover;border-radius:4px;border:1px solid #dee2e6"
                                 loading="lazy">';
                }
                return '<span class="text-muted small">Tidak ada</span>';
            })
            ->addColumn('title', function ($news) {
                return e($news->title);
            })
            ->addColumn('author', function ($news) {
                return $news->user ? e($news->user->name) : '<span class="text-muted fst-italic">Anonim</span>';
            })
            ->addColumn('status', function ($news) {
                if ($news->status === 'published') {
                    return '<span class="badge bg-success">Published</span>';
                }
                return '<span class="badge bg-secondary">Draft</span>';
            })
            ->addColumn('action', function ($news) {
                $btn  = '<div class="d-flex justify-content-center align-items-center" style="gap:5px">';

                // Tombol Edit
                $btn .= '<a href="' . route('news.edit', $news->id) . '"
                            class="btn btn-sm btn-warning text-white"
                            style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                            title="Edit">
                            <i class="bi bi-pencil-fill" style="font-size:12px"></i>
                         </a>';

                // Tombol Hapus
                $btn .= '<form action="' . route('news.destroy', $news->id) . '"
                              method="POST" class="m-0"
                              onsubmit="return confirm(\'Yakin ingin menghapus berita ini?\')">'
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
            ->rawColumns(['thumbnail', 'status', 'action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<News>
     */
    public function query(News $model): QueryBuilder
    {
        return $model->newQuery()->with('user')->select(['id', 'user_id', 'thumbnail', 'title', 'status']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('news-table')
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

            Column::computed('thumbnail')
                ->title('Thumbnail')
                ->width('10%')
                ->addClass('text-center')
                ->exportable(false)
                ->printable(false),

            Column::make('title')
                ->title('Judul Berita'),

            Column::computed('author')
                ->title('Penulis'),

            Column::make('status')
                ->title('Status')
                ->width('10%')
                ->addClass('text-center'),

            Column::computed('action')
                ->title('Aksi')
                ->exportable(false)
                ->printable(false)
                ->width('10%')
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'News_' . date('YmdHis');
    }
}
