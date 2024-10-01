<?php

namespace App\Exports;

use App\Models\Restaurant;
use App\Models\Restro;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RestroExport implements FromCollection, WithHeadings, WithTitle, WithStyles
{
    public function styles(Worksheet $sheet)
    {
        return [
            '1' => ['font' => ['bold' => true, 'size' => 12], 'borders' => ['bottom' => ['borderStyle' => Border::BORDER_THIN], 'top' => ['borderStyle' => Border::BORDER_THIN]]],
        ];
    }

    public function collection()
    {
        $collection = [];
        $coll = Restaurant::select('id','name','mobile',DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as created'), 'passport_price',DB::raw('case when status=1 then "Active" else "Deactive" end as status'), DB::raw('case when top_restro=1 then "Yes" else "No" end as top'))->orderBy('id', 'asc')->get();
        foreach ($coll as $key => $val) {
            $row = array();
            $row[0] = $val->name;

            $Transaction = Restro::select('email')->where('restro_id', $val->id)->where('is_admin',1)->first();
            $row[1] = $Transaction->email ?? '';

            $row[2] = $val->mobile;
            $row[3] = $val->created;
            $row[4] = $val->passport_price;
            $row[5] = $val->status;
            $row[6] = $val->top;

            array_push($collection, $row);
        }
        return collect($collection);
    }
    public function title(): string
    {
        return 'Restaurant List';
    }

    public function headings(): array
    {
        $array = [
            'Name', 'Email', 'Contact No.', 'Created Date', 'Passport Price', 'Status', 'Top Restaurant'
        ];
        return $array;
    }
}
