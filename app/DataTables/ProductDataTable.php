<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Product> $query
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('category', function ($product) {
                return $product->category 
                    ? e($product->category->nama_kategori) 
                    : '<span class="text-muted fst-italic">Tanpa Kategori</span>';
            })
            ->addColumn('dimensi', function ($product) {
                return $product->panjang . ' x ' . $product->lebar . ' x ' . $product->tebal . ' cm';
            })
            ->addColumn('harga', function ($product) {
                return 'Rp ' . number_format($product->harga, 0, ',', '.');
            })
            ->addColumn('action', function ($product) {
                $btn  = '<div class="d-flex justify-content-center align-items-center" style="gap:5px">';

                // Tombol Edit
                $btn .= '<a href="' . route('product.edit', $product->id) . '"
                            class="btn btn-sm btn-warning text-white"
                            style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                            title="Edit">
                            <i class="bi bi-pencil-fill" style="font-size:12px"></i>
                         </a>';

                // Tombol Hapus
                $btn .= '<form action="' . route('product.destroy', $product->id) . '"
                              method="POST" class="m-0"
                              onsubmit="return confirm(\'Yakin ingin menghapus produk ini?\')">'
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
            ->rawColumns(['category', 'action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Product>
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery()->with('category')->select(['id', 'category_id', 'kode_produk', 'nama_produk', 'panjang', 'lebar', 'tebal', 'harga', 'stok']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
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

            Column::make('kode_produk')
                ->title('Kode Produk'),

            Column::computed('category')
                ->title('Kategori'),

            Column::make('nama_produk')
                ->title('Nama Produk'),

            Column::computed('dimensi')
                ->title('Dimensi (P x L x T)'),

            Column::make('harga')
                ->title('Harga'),

            Column::make('stok')
                ->title('Stok')
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
        return 'Product_' . date('YmdHis');
    }
}
