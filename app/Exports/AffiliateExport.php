<?php

namespace App\Exports;

use App\Models\Affiliate;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AffiliateExport implements FromCollection, WithHeadings, WithTitle, WithStyles
{
    public function styles(Worksheet $sheet)
    {
        return [
            '1' => ['font' => ['bold' => true, 'size' => 12], 'borders' => ['bottom' => ['borderStyle' => Border::BORDER_THIN], 'top' => ['borderStyle' => Border::BORDER_THIN]]],
        ];
    }

    public function collection()
    {
        $collection = Affiliate::select(DB::raw('concat(first_name, " ", last_name) as name'),'email','mobile',DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as created'),DB::raw('case when status=1 then "Active" else "Deactive" end as stat'))->orderBy('id', 'asc')->get();
        return collect($collection);
    }
    public function title(): string
    {
        return 'Affiliate List';
    }

    public function headings(): array
    {
        $array = [
            'Name', 'Email', 'Contact No.', 'Created Date', 'Status'
        ];
        return $array;
    }
}
