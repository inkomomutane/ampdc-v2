<?php

namespace App\Exports;


use App\Enums\Gender;
use App\Models\Organization;
use App\Models\VictimCase;
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

        if($this->type === 'cases'){
            $this->cases =  $this->case->cases->map(fn(VictimCase $case) => $this->getCaseArray($case))->toArray();
        }
       else if($this->type === 'forwarded'){
            $this->cases = $this->case->forwardedCases->map(fn(VictimCase $case) => $this->getCaseArray($case))->toArray();
        }
      else  if($this->type === 'received'){
            $this->cases = $this->case->receivedCases->map(fn(VictimCase $case) => $this->getCaseArray($case))->toArray();
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

    private function getCaseArray(VictimCase $case): array
    {
      return [
            $case->case_code,
            $case->victim->name,
            $case->victim->gender->value,
            $case->victim->civil_state->value,
            $case->violenceType->name,
            ($case->victim->gender === Gender::FEMALE && $case->is_violence_caused_death) ? 'Sim' : 'Não',
            $case->perpetrator->name,
            $case->supposedReasonOfViolence->name,
            $case->violenceIncidentLocation->name,
            $case->victim->date_of_birth->age,
            $case->victim->neighborhood->name,
            $case->organization->name,
            $case->progress_status->value,
            Date::dateTimeToExcel($case->created_at),
            $case->violence_details,
            $case->conclusion
        ];
    }

    public function headings(): array
    {
        return [
            'Código do caso',
            'Nome da vítima',
            'Sexo',
            'Estado civíl',
            'Tipo de violência',
            'É um caso de feminicídio?',
            'Perpetrador',
            'Suposto motivo',
            'Local do incidente',
            'Idade',
            'Bairro',
            'Organização que esta a tratar o caso',
            'Estado do caso',
            'Data de registo',
            'Detalhes do caso',
            'Conclusão do caso'
        ];
    }


    /**
     * @throws Exception
     */
    public function styles(Worksheet $sheet) :void
    {
        $sheet->setTitle( 'Casos de vitimas');
        $length = count($this->cases)  + 1;
        $sheet->getStyle('A1:P1')->getFont()->setBold(true);
        $sheet->getStyle('A1:P1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:P1')->getAlignment()->setVertical('center');
        $sheet->getStyle("A1:P$length")->getBorders()->getAllBorders()->setBorderStyle('thin');
        $sheet->getStyle('A1:P1')->getBorders()->getAllBorders()->setBorderStyle('medium');
    }

    public function columnFormats(): array
    {
        return [
            'J' => NumberFormat::FORMAT_NUMBER,
            'N' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }




}
