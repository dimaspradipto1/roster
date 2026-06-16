<?php

namespace App\DataTables;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BookingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Booking> $query
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('nama', function ($booking) {
                return e($booking->nama);
            })
            ->addColumn('product', function ($booking) {
                return $booking->product
                    ? e($booking->product->nama_produk) . ' (' . e($booking->product->kode_produk) . ')'
                    : '<span class="text-muted fst-italic">Tanpa Produk</span>';
            })
            ->addColumn('admin', function ($booking) {
                return $booking->nomorAdmin
                    ? e($booking->nomorAdmin->nama_admin) . ' (' . e($booking->nomorAdmin->no_wa) . ')'
                    : '<span class="text-muted fst-italic">Tanpa Admin</span>';
            })
            ->addColumn('no_wa', function ($booking) {
                return e($booking->no_wa);
            })
            ->addColumn('action', function ($booking) {
                $btn  = '<div class="d-flex justify-content-center align-items-center" style="gap:5px">';

                // Format nomor WA ke standar internasional (contoh: 0812 -> 62812)
                $phone = preg_replace('/[^0-9]/', '', $booking->no_wa);
                if (strpos($phone, '62') === 0) {
                    // Sudah diawali dengan 62
                } elseif (strpos($phone, '0') === 0) {
                    $phone = '62' . substr($phone, 1);
                } else {
                    $phone = '62' . $phone;
                }
                $prodName = $booking->product ? $booking->product->nama_produk : 'Produk Roster';
                $prodCode = $booking->product ? $booking->product->kode_produk : '-';
                $message = urlencode("Halo Kak " . $booking->nama . ", kami dari admin Roster. Terkait booking Anda untuk produk *" . $prodName . "* (Kode: " . $prodCode . "), ada yang bisa kami bantu?");
                $waUrl = "https://wa.me/" . $phone . "?text=" . $message;

                // Tombol Hubungi via WA
                $btn .= '<a href="' . $waUrl . '"
                            target="_blank"
                            class="btn btn-sm btn-success text-white"
                            style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                            title="Hubungi via WhatsApp">
                            <i class="bi bi-whatsapp" style="font-size:12px"></i>
                         </a>';

                // Tombol Edit
                $btn .= '<a href="' . route('booking.edit', $booking->id) . '"
                            class="btn btn-sm btn-warning text-white"
                            style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                            title="Edit">
                            <i class="bi bi-pencil-fill" style="font-size:12px"></i>
                         </a>';

                // Tombol Hapus
                $btn .= '<form action="' . route('booking.destroy', $booking->id) . '"
                              method="POST" class="m-0"
                              onsubmit="return confirm(\'Yakin ingin menghapus booking ini?\')">'
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
            ->rawColumns(['product', 'admin', 'action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Booking>
     */
    public function query(Booking $model): QueryBuilder
    {
        return $model->newQuery()->with(['product', 'nomorAdmin'])->select(['id', 'product_id', 'nomor_admin_id', 'nama', 'no_wa']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('booking-table')
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

            Column::make('nama')
                ->title('Nama'),

            Column::computed('product')
                ->title('Produk'),

            Column::make('no_wa')
                ->title('No. WhatsApp (Pelanggan)'),

            Column::computed('admin')
                ->title('Admin Tujuan'),

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
        return 'Booking_' . date('YmdHis');
    }
}
