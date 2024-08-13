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
            $case->victim->age,
          $case->victim->gender->value,
            $case->victim->civil_state->value,
            $case->victim->contact,
            $case->victim->has_profession ? 'Sim' : 'Não',
            $case->victim->profession,
            $case->victim->education_level->value,
            $case->victim->contact_alternative,
            $case->victim->contact_person,
            $case->victim->contact_person_relationship,
            $case->victim->has_children ? 'Sim' : 'Não',
            $case->victim->number_of_children,
            $case->victim->live_with_other_parents ? 'Sim' : 'Não',
            $case->victim->city,
            $case->victim->neighborhood,
            $case->victim->address,
            $case->violenceType->name,
            $case->perpetrator->name,
            $case->perpetrator_relationship,
             $case->perpetrator_name,
              $case->perpetrator_profession,
              $case->perpetrator_address,
              $case->perpetrator_contact,
          $case->perpetrator_contact_alternative,
            $case->period_of_violence_act,
            $case->violenceIncidentLocation->name,
            $case->supposedReasonOfViolence->name,
            $case->violence_details,
            $case->is_violence_caused_death ? 'Sim' : 'Não',
            $case->is_terminated ? 'Sim' : 'Não',
            $case->conclusion,
            $case->caseRegisteredBy->name,
            $case->caseRegisteredByOrganization->name,
            $case->case_registered_at->format('d/m/Y'),
            $case->case_registered_address,
            $case->case_registered_agent,
            $case->case_registered_city,
            $case->case_registered_province,
            $case->case_registered_district,
            $case->is_violence_reported_to_authorities ? 'Sim' : 'Não',
            $case->is_the_first_time ? 'Sim' : 'Não',
            $case->last_violences_description,
            $case->is_the_last_cases_reported_to_authorities ? 'Sim' : 'Não',
            $case->are_last_cases_resolved ? 'Sim' : 'Não',
            $case->last_cases_resolution_details,


        ];
    }

    public function headings(): array
    {
        return [
            "Código do caso",
            "Nome da vítima",
            "Idade da vítima",
            "Género da vítima",
            "Estado civil da vítima",
            "Contacto da vítima",
            "Tem profissão?",
            "Profissão da vítima",
            "Nível de escolaridade da vítima",
            "Contacto alternativo da vítima",
            "Contacto da pessoa de referência",
            "Parentesco com a pessoa de referência",
            "Tem filhos?",
            "Número de filhos",
            "Vive com outros pais?",
            "Cidade da vítima",
            "Bairro da vítima",
            "Endereço da vítima",
            "Tipo de violência sofrida",
            "Parentesco com o agressor",
            "Nome do agressor",
            "Profissão do agressor",
            "Endereço do agressor",
            "Contacto do agressor",
            "Contacto alternativo do agressor",
            "Período do acto de violência",
            "Local do incidente de violência",
            "Suposta razão da violência",
            "Detalhes da violência",
            "A violência resultou em morte?",
            "O caso foi encerrado?",
            "Conclusão",
            "Registado por",
            "Organização que registou o caso",
            "Data de registo",
            "Endereço de registo",
            "Agente de registo",
            "Cidade de registo",
            "Província de registo",
            "Distrito de registo",
            "A violência foi reportada às autoridades?",
            "É a primeira vez?",
            "Descrição das últimas violências",
            "Os últimos casos foram reportados às autoridades?",
            "Os últimos casos foram resolvidos?",
            "Detalhes da resolução dos últimos casos",
        ];
    }


    /**
     * @throws Exception
     */
    public function styles(Worksheet $sheet) :void
    {
        $sheet->setTitle( 'Casos de vitimas');
        $length = count($this->cases)  + 1;
        $sheet->getStyle('A1:AZ1')->getFont()->setBold(true);
        $sheet->getStyle('A1:AZ1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:AZ1')->getAlignment()->setVertical('center');
        $sheet->getStyle("A1:AZ$length")->getBorders()->getAllBorders()->setBorderStyle('thin');
        $sheet->getStyle('A1:AZ1')->getBorders()->getAllBorders()->setBorderStyle('medium');
    }

    public function columnFormats(): array
    {
        return [
            'J' => NumberFormat::FORMAT_NUMBER,
            'N' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }




}
