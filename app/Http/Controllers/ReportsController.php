<?php

namespace App\Http\Controllers;

use App\Enums\CaseProgressStatus;
use App\Models\Neighborhood;
use App\Models\VictimCase;
use App\Models\ViolenceType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReportsController extends Controller
{
    public function __invoke(Request $request)
    {
        $year = $request->year ?? now()->year;
        return Inertia::render('Reports',[
            'casesCountArrayByYear' => $this->getCasesByYear($year),
            'casesCount' => $this->getCasesCountByYear($year),
            'forwardedCasesCount' => $this->getCasesCountByYear($year,'forwarded'),
            'receivedCasesCount' => $this->getCasesCountByYear($year,'received'),
            'causeOfDeath' => $this->getCauseCauses($year),
            'neighborhoodDeaths' => $this->getNeighborhoodDeaths($year)
        ]);
    }

    private function getCasesByYear(int $year) : array
    {
        $monthCounts = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthCounts[] = VictimCase::whereYear('created_at',$year)
                ->whereOrganizationId(organization()->id)
                ->whereMonth('created_at',$i)
                ->count();
        }
     return $monthCounts;
    }

    private  function getCasesCountByYear (int $year,string $type = 'cases') : object
    {

       if($type === 'cases'){
           return (object) [
               'total' =>  VictimCase::whereYear('created_at',$year)->count(),
               'done' =>    VictimCase::whereYear('created_at',$year)->whereProgressStatus(CaseProgressStatus::SOLVED->value)->count(),
               'pending' => VictimCase::whereYear('created_at',$year)->whereNot('progress_status','<=>',CaseProgressStatus::SOLVED->value )->count()
           ];
       }

        if($type === 'forwarded'){
            return (object) [
                'total' =>  VictimCase::whereYear('created_at',$year)->count(),
                'done' =>    VictimCase::whereYear('created_at',$year)->whereProgressStatus(CaseProgressStatus::SOLVED->value)->count(),
                'pending' => VictimCase::whereYear('created_at',$year)->whereNot('progress_status','<=>',CaseProgressStatus::SOLVED->value )->count()
            ];
        }

        return (object) [
            'total' =>  VictimCase::whereYear('created_at',$year)->count(),
            'done' =>    VictimCase::whereYear('created_at',$year)->whereProgressStatus(CaseProgressStatus::SOLVED->value)->count(),
            'pending' => VictimCase::whereYear('created_at',$year)->whereNot('progress_status','<=>',CaseProgressStatus::SOLVED->value )->count()
        ];
    }

    private function getCauseCauses (int $year) : object {

        $causes = ViolenceType::all();

        $causeCases = collect([]);

        foreach ($causes as $cause) {
            $causeCases->put($cause->name,VictimCase::whereOrganizationId(organization()->id)->whereYear('created_at',$year)
            ->whereViolenceTypeId($cause->id)

                ->count());
        }

        return (object) [
            'labels' => $causeCases->keys()->toArray(),
            'values' => $causeCases->values()->toArray()
        ];
    }
    private function getNeighborhoodDeaths (int $year) : object {

        $causes = Neighborhood::all();

        $causeCases = collect([]);

        foreach ($causes as $cause) {
            $causeCases->put($cause->name,
                VictimCase::
                whereOrganizationId(organization()->id)->whereYear('created_at',$year)
                ->whereRelation('victim.neighborhood','id',$cause->id)

                    ->count())

            ;
        }
        return (object) [
            'labels' => $causeCases->keys()->toArray(),
            'values' => $causeCases->values()->toArray()
        ];
    }
}
