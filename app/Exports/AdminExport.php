<?php

namespace App\Exports;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AdminExport implements FromCollection, WithHeadings, WithTitle, WithStyles
{
    use Exportable;

    public function __construct()
    {
    }
    public function styles(Worksheet $sheet)
    {
        return [
            '1' => ['font' => ['bold' => true, 'size' => 12], 'borders' => ['bottom' => ['borderStyle' => Border::BORDER_THIN], 'top' => ['borderStyle' => Border::BORDER_THIN]]],
        ];
    }

    public function collection()
    {
        $collection = Admin::select('name','email','mobile','role',DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as created'))->where('is_admin', 0)->orderBy('id', 'asc')->get();
        return collect($collection);
    }
    public function title(): string
    {
        return 'Sub Admin List';
    }

    public function headings(): array
    {
        $array = [
            'Name', 'Email', 'Contact No.', 'Role', 'Created Date'
        ];
        return $array;
    }
}
