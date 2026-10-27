<?php

namespace App\DataTables;

use App\Models\Inspeksi;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class InspeksiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Inspeksi> $query
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('no_laporan', function ($row) {
                $html = '<div class="fw-semibold text-primary">' . e($row->no_laporan) . '</div>';
                if ($row->file_laporan) {
                    $html .= '<a href="' . asset('storage/' . $row->file_laporan) . '" target="_blank" class="badge bg-light text-primary border text-decoration-none mt-1">
                                <i class="bi bi-file-earmark-pdf me-1"></i>Dokumen
                              </a>';
                }
                return $html;
            })
            ->addColumn('unit', function ($row) {
                return '<span class="badge bg-secondary px-2 py-1">' . e($row->unit) . '</span>';
            })
            ->addColumn('bidang_inspeksi', function ($row) {
                // Color badges depending on common inspection fields
                $bg = match (strtoupper(trim($row->bidang_inspeksi))) {
                    'PTP'  => 'bg-primary',
                    'PAA'  => 'bg-info text-dark',
                    'PUBT' => 'bg-warning text-dark',
                    'EE'   => 'bg-success',
                    default => 'bg-dark',
                };
                return '<span class="badge ' . $bg . ' px-2 py-1 font-monospace">' . e($row->bidang_inspeksi) . '</span>';
            })
            ->addColumn('perusahaan_pemilik', function ($row) {
                return '<span class="fw-semibold">' . e($row->perusahaan_pemilik) . '</span>';
            })
            ->addColumn('alamat_perusahaan', function ($row) {
                $short = \Illuminate\Support\Str::limit($row->alamat_perusahaan, 45);
                return '<span title="' . e($row->alamat_perusahaan) . '" style="cursor:help">' . e($short) . '</span>';
            })
            ->addColumn('nama_alat', function ($row) {
                return '<span class="fw-medium text-dark">' . e($row->nama_alat) . '</span>';
            })
            ->addColumn('nomor_seri', function ($row) {
                return $row->nomor_seri
                    ? '<span class="badge bg-light text-dark border">' . e($row->nomor_seri) . '</span>'
                    : '<span class="text-muted fst-italic">—</span>';
            })
            ->addColumn('tanggal_inspeksi', function ($row) {
                return $row->tanggal_inspeksi
                    ? Carbon::parse($row->tanggal_inspeksi)->translatedFormat('d F Y')
                    : '—';
            })
            ->addColumn('tanggal_expired', function ($row) {
                return $row->tanggal_expired
                    ? Carbon::parse($row->tanggal_expired)->translatedFormat('d F Y')
                    : '—';
            })
            ->addColumn('action', function ($row) {
                $btn = '<div class="d-flex justify-content-center align-items-center" style="gap:5px">';

                // Tombol Detail / Show
                $btn .= '<a href="' . route('inspeksi.show', $row->id) . '"
                            class="btn btn-sm btn-info text-white"
                            style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                            title="Detail">
                            <i class="bi bi-eye-fill" style="font-size:12px"></i>
                         </a>';

                // Tombol Edit
                $btn .= '<a href="' . route('inspeksi.edit', $row->id) . '"
                            class="btn btn-sm btn-warning text-white"
                            style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                            title="Edit">
                            <i class="bi bi-pencil-fill" style="font-size:12px"></i>
                         </a>';

                // Tombol Hapus
                $btn .= '<form action="' . route('inspeksi.destroy', $row->id) . '"
                               method="POST" class="m-0 form-delete-' . $row->id . '"
                               onsubmit="return confirm(\'Yakin ingin menghapus data inspeksi ' . e($row->no_laporan) . '?\')">'
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
            ->setRowId('id')
            ->rawColumns([
                'no_laporan',
                'unit',
                'bidang_inspeksi',
                'perusahaan_pemilik',
                'alamat_perusahaan',
                'nama_alat',
                'nomor_seri',
                'action',
            ]);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Inspeksi>
     */
    public function query(Inspeksi $model): QueryBuilder
    {
        return $model->newQuery()->latest();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('inspeksi-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1, 'desc')
            ->selectStyleSingle()
            ->parameters([
                'responsive' => true,
                'autoWidth'  => false,
                'language'   => [
                    'url' => 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/id.json',
                ],
            ])
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
                ->width('4%')
                ->addClass('text-center align-middle')
                ->searchable(false)
                ->orderable(false),

            Column::make('no_laporan')
                ->title('No Laporan')
                ->addClass('align-middle'),

            Column::make('unit')
                ->title('Unit')
                ->width('5%')
                ->addClass('text-center align-middle'),

            Column::make('bidang_inspeksi')
                ->title('Bidang Inspeksi')
                ->width('10%')
                ->addClass('text-center align-middle'),

            Column::make('perusahaan_pemilik')
                ->title('Perusahaan Pemilik')
                ->addClass('align-middle'),

            Column::make('alamat_perusahaan')
                ->title('Alamat Perusahaan')
                ->addClass('align-middle'),

            Column::make('nama_alat')
                ->title('Nama Alat/Nama Merk')
                ->addClass('align-middle'),

            Column::make('nomor_seri')
                ->title('Nomor Seri')
                ->width('8%')
                ->addClass('text-center align-middle'),

            Column::make('tanggal_inspeksi')
                ->title('Tanggal Inpek')
                ->width('11%')
                ->addClass('text-center align-middle'),

            Column::make('tanggal_expired')
                ->title('Expired')
                ->width('11%')
                ->addClass('text-center align-middle'),

            Column::computed('action')
                ->title('Aksi')
                ->exportable(false)
                ->printable(false)
                ->width('10%')
                ->addClass('text-center align-middle'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Inspeksi_' . date('YmdHis');
    }
}
