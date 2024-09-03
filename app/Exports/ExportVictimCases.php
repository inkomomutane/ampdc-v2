<?php

namespace App\Exports;


use App\Enums\Gender;
use App\Models\Organization;
use App\Models\VictimCase;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

 class ExportVictimCases implements FromQuery,WithHeadings,WithStyles,ShouldAutoSize,WithColumnFormatting,WithMapping
{



    public function query()
    {
        return VictimCase::query();
    }

    public function map(mixed $row): array
    {
        /** @var VictimCase $row */
      return [
          strip_tags($row->case_code),
          strip_tags($row->victim->name),
          strip_tags($row->victim->age),
          strip_tags($row->victim->gender->value),
          strip_tags($row->victim->civil_state?->value),
          strip_tags($row->victim->contact),
          $row->victim->has_profession ? 'Sim' : 'Não',
          strip_tags($row->victim->profession),
          strip_tags($row->victim->education_level?->value),
          strip_tags($row->victim->contact_alternative),
          strip_tags($row->victim->contact_person),
          strip_tags($row->victim->contact_person_relationship),
          $row->victim->has_children ? 'Sim' : 'Não',
          strip_tags($row->victim->number_of_children),
          $row->victim->live_with_other_parents ? 'Sim' : 'Não',
          strip_tags($row->victim->city),
          strip_tags($row->victim->neighborhood),
          strip_tags($row->victim->address),
          strip_tags($row->violenceType?->name),
          strip_tags($row->perpetrator?->name),
          strip_tags($row->perpetrator_name),
          strip_tags($row->perpetrator_profession),
          strip_tags($row->perpetrator_address),
          strip_tags($row->perpetrator_contact),
          strip_tags($row->perpetrator_contact_alternative),
          strip_tags($row->period_of_violence_act?->value),
          strip_tags($row->violenceIncidentLocation?->name),
          strip_tags($row->supposedReasonOfViolence?->name),
          strip_tags($row->violence_details),
          $row->is_violence_caused_death ? 'Sim' : 'Não',
          $row->is_terminated ? 'Sim' : 'Não',
          strip_tags($row->conclusion),
          strip_tags($row->caseRegisteredBy?->name),
          strip_tags($row->caseRegisteredByOrganization?->name),
          strip_tags($row->case_registered_at?->format('d/m/Y')),
          strip_tags($row->case_registered_address),
          strip_tags($row->case_registered_agent),
          strip_tags($row->case_registered_city),
          strip_tags($row->case_registered_province),
          strip_tags($row->case_registered_district),
          $row->is_violence_reported_to_authorities ? 'Sim' : 'Não',
          $row->is_the_first_time ? 'Sim' : 'Não',
          strip_tags($row->last_violences_description),
          $row->is_the_last_cases_reported_to_authorities ? 'Sim' : 'Não',
          $row->are_last_cases_resolved ? 'Sim' : 'Não',
          strip_tags($row->last_cases_resolution_details),
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
        $length = VictimCase::count()  + 1;
        $sheet->getStyle('A1:AT1')->getFont()->setBold(true);
        $sheet->getStyle('A1:AT1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:AT1')->getAlignment()->setVertical('center');
        $sheet->getStyle("A1:AT$length")->getBorders()->getAllBorders()->setBorderStyle('thin');
        $sheet->getStyle('A1:AT1')->getBorders()->getAllBorders()->setBorderStyle('medium');
    }

    public function columnFormats(): array
    {
        return [
            'J' => NumberFormat::FORMAT_NUMBER,
        ];
    }




}
