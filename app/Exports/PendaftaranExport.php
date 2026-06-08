<?php

namespace App\Exports;

use App\Models\PendaftaranSiswa;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Http\Request;

class PendaftaranExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithTitle, ShouldAutoSize
{
    protected Request $request;
    protected int $rowNumber = 0;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function title(): string
    {
        return 'Data Pendaftaran PPDB';
    }

    public function query()
    {
        $query = PendaftaranSiswa::query()->latest();

        if ($this->request->filled('search')) {
            $q = $this->request->search;
            $query->where(function ($sub) use ($q) {
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('kode_pendaftaran', 'like', "%{$q}%");
            });
        }

        if ($this->request->filled('status')) {
            $query->where('status', $this->request->status);
        }

        if ($this->request->filled('jurusan')) {
            $query->where('minat_jurusan', $this->request->jurusan);
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Pendaftaran',
            'Nama Lengkap',
            'Jenis Kelamin',
            'Sekolah Asal',
            'Minat Jurusan',
            'Status',
            'Tanggal Dikirim',
            'Tanggal Dibuat',
        ];
    }

    public function map($pendaftaran): array
    {
        $this->rowNumber++;

        $statusLabels = [
            'draft'        => 'Draft',
            'terkirim'     => 'Terkirim',
            'diverifikasi' => 'Diverifikasi',
            'diterima'     => 'Diterima',
            'ditolak'      => 'Ditolak',
        ];

        return [
            $this->rowNumber,
            $pendaftaran->kode_pendaftaran ?? '-',
            $pendaftaran->nama ?? '-',
            $pendaftaran->jenis_kelamin ?? '-',
            $pendaftaran->sekolah_asal ?? '-',
            $pendaftaran->minat_jurusan ?? '-',
            $statusLabels[$pendaftaran->status] ?? ucfirst($pendaftaran->status),
            $pendaftaran->submitted_at ? $pendaftaran->submitted_at->format('d-m-Y H:i') : '-',
            $pendaftaran->created_at->format('d-m-Y H:i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();
        $lastCol = 'I'; // Column I = 9 columns

        // Style header row
        $sheet->getStyle("A1:{$lastCol}1")->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '017A85'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
                'wrapText'   => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '015C64'],
                ],
            ],
        ]);

        // Style data rows
        if ($lastRow > 1) {
            $sheet->getStyle("A2:{$lastCol}{$lastRow}")->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => 'D1D5DB'],
                    ],
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                    'wrapText' => true,
                ],
            ]);

            // Zebra striping
            for ($i = 2; $i <= $lastRow; $i++) {
                if ($i % 2 === 0) {
                    $sheet->getStyle("A{$i}:{$lastCol}{$i}")->applyFromArray([
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['rgb' => 'F0FDFA'],
                        ],
                    ]);
                }
            }

            // Center "No" column
            $sheet->getStyle("A2:A{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        }

        // Set row height for header
        $sheet->getRowDimension(1)->setRowHeight(30);

        return [];
    }
}
