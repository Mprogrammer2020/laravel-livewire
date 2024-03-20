<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class LeadsExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles,WithMapping
{

    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::Role('CLIENT')->orderBy('id', 'DESC')->get();
    }

    public function map($lead) : array {
        $desiredEffectsString="";
        foreach ($lead->desiredEffects as $key => $effect) {
            $desiredEffectsString.= $effect->name.", ";
        }
        // $desiredEffectsString=rtrim($desiredEffectsString, ', ');
        // dd($desiredEffectsString);
        return [
            $lead->name,
            $lead->email,
            $lead->phone,
            $lead->business_name,
            $lead->strainBase()->exists() ? $lead->strainBase->name : "",
            rtrim($desiredEffectsString, ', '),
            $lead->strainOption()->exists() ? $lead->strainOption->name : "",
            $lead->created_at->format('d-m-Y h:i A')
            
            // Carbon::parse($registration->event_date)->toFormattedDateString()
        ] ;
 
 
    }

        public function headings(): array
        {
            return [
                'Name',
                'Email',
                'Phone',
                'Business Name',
                'Strain Base',
                'Effects',
                'Strain Option',
                'Created At'
            ];
        }
        

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true,'size' => 15]],
        ];

    }

}
