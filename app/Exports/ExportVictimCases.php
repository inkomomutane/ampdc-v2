<?php

namespace App\Exports;


use App\Models\Organization;
use App\Models\VictimCasesHistory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

 class ExportVictimCases implements FromArray,WithHeadings,WithStyles,ShouldAutoSize,WithColumnFormatting
{

    private array $cases;

    public function __construct(public Organization $case,public string $type = 'cases')
    {
        $case->load([
          'forwardedCases.victim.neighborhood',
            'forwardedCases.victim.violenceType',
            'forwardedCases.organization',
            'forwardedCases.fromOrganization',
            'forwardedCases.toOrganization',
            'cases.victim.neighborhood',
            'cases.victim.violenceType',
            'cases.organization',
            'cases.fromOrganization',
            'cases.toOrganization',
            'receivedCases.victim.violenceType',
            'receivedCases.victim.neighborhood',
            'receivedCases.organization',
            'receivedCases.fromOrganization',
            'receivedCases.toOrganization',
        ]);
        if($this->type === 'cases'){
            $this->cases =  $this->case->cases->map(fn(VictimCasesHistory $case) => [
                $case->victim->name,
                $case->victim->violenceType->name,
                $case->victim->age,
                $case->victim->neighborhood->name,
                $case->organization->name,
                $case->progress_status->value,
                Date::dateTimeToExcel($case->created_at),
                $case->case_details
            ])->toArray();
        }
       else if($this->type === 'forwarded'){
            $this->cases = $this->case->forwardedCases->map(fn(VictimCasesHistory $case) => [
                $case->victim->name,
                $case->victim->violenceType->name,
                $case->victim->age,
                $case->victim->neighborhood->name,
                $case->organization->name,
                $case->progress_status->value,
                Date::dateTimeToExcel($case->created_at),
                $case->case_details
            ])->toArray();
        }
      else  if($this->type === 'received'){
            $this->cases = $this->case->receivedCases->map(fn(VictimCasesHistory $case) => [
                $case->victim->name,
                $case->victim->violenceType->name,
                $case->victim->age,
                $case->victim->neighborhood->name,
                $case->organization->name,
                $case->progress_status->value,
                Date::dateTimeToExcel($case->created_at),
                $case->case_details
            ])->toArray();
        }
        else {
            $this->cases = [];
        }



    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->cases;
    }

    public function headings(): array
    {
        return [
            'Nome da vítima',
            'Causa da morte',
            'Idade',
            'Bairro',
            'Organização que esta a tratar o caso',
            'Estado do caso',
            'Data de registo',
            'Detalhes do caso',
        ];
    }


    /**
     * @throws Exception
     */
    public function styles(Worksheet $sheet) :void
    {
        $sheet->setTitle( 'Casos de vitimas');
        $length = count($this->cases)  + 1;
        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:H1')->getAlignment()->setVertical('center');
        $sheet->getStyle("A1:H$length")->getBorders()->getAllBorders()->setBorderStyle('thin');
        $sheet->getStyle('A1:H1')->getBorders()->getAllBorders()->setBorderStyle('medium');
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER,
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

}
