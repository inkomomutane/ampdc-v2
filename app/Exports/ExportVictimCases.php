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
          $row->case_code,
            $row->victim->name,
            $row->victim->age,
            $row->victim->gender->value,
            $row->victim->civil_state?->value,
            $row->victim->contact,
            $row->victim->has_profession ? 'Sim' : 'Não',
            $row->victim->profession,
            $row->victim->education_level?->value,
            $row->victim->contact_alternative,
            $row->victim->contact_person,
            $row->victim->contact_person_relationship,
            $row->victim->has_children ? 'Sim' : 'Não',
            $row->victim->number_of_children,
            $row->victim->live_with_other_parents ? 'Sim' : 'Não',
            $row->victim->city,
            $row->victim->neighborhood,
            $row->victim->address,
            $row->violenceType?->name,
            $row->perpetrator?->name,
            $row->perpetrator_name,
            $row->perpetrator_profession,
            $row->perpetrator_address,#X
            $row->perpetrator_contact,
            $row->perpetrator_contact_alternative,
            $row->period_of_violence_act?->value,
            $row->violenceIncidentLocation?->name,
            $row->supposedReasonOfViolence?->name,
            $row->violence_details,
            $row->is_violence_caused_death ? 'Sim' : 'Não',
            $row->is_terminated ? 'Sim' : 'Não',
            $row->conclusion,
            $row->caseRegisteredBy?->name,
            $row->caseRegisteredByOrganization?->name,
            $row->case_registered_at?->format('d/m/Y'),
            $row->case_registered_address,
            $row->case_registered_agent,
            $row->case_registered_city,
            $row->case_registered_province,
            $row->case_registered_district,
            $row->is_violence_reported_to_authorities ? 'Sim' : 'Não',
            $row->is_the_first_time ? 'Sim' : 'Não',
            $row->last_violences_description,
            $row->is_the_last_cases_reported_to_authorities ? 'Sim' : 'Não',
            $row->are_last_cases_resolved ? 'Sim' : 'Não',
            $row->last_cases_resolution_details,


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
