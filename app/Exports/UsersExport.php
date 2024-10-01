<?php

namespace App\Exports;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithTitle, WithStyles
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
        $coll = User::select('id','name','email','mobile',DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as created'),DB::raw('case when subscription_status=1 then "Yes" else "No" end as status'),DB::raw('case when status=1 then "Active" else "Deactive" end as stat'))->orderBy('id', 'asc')->get();
        // dd($coll[10]->current_restro);
        foreach ($coll as $key => $val) {
            $row = array();
            $row[0] = $val->name;
            $row[1] = $val->email;
            $row[2] = $val->mobile;
            $row[3] = $val->created;
            $row[4] = $val->status;

            $Transaction = Transaction::where('user_id', $val->id)->where('status',1)->where('start_date','<=', date('Y-m-d'))->where('end_date','>=', date('Y-m-d'))->count();
            $row[5] = $Transaction == 0 ? '-' : $Transaction;

            if($val->source == 1) {
                $row[6] = 'User';
            } elseif($val->source == 2) {
                $row[6] = 'Restro';
            } elseif($val->source == 3) {
                $row[6] = 'Admin';
            } elseif($val->source == 4) {
                $row[6] = 'Affiliate';
            } else {
                $row[6] = '-';
            }
            $row[7] = $val->stat;
            array_push($collection, $row);
        }
        return collect($collection);
    }
    public function title(): string
    {
        return 'User List';
    }

    public function headings(): array
    {
        $array = [
            'Name', 'Email', 'Contact No.', 'Created Date', 'Purchase Subscription', 'No Of Passport', 'Source', 'Status'
        ];
        return $array;
    }
}
