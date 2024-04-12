<?php

namespace App\Http\Controllers;

use App\Enums\CaseProgressStatus;
use App\Models\VictimCasesHistory;
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
            'receivedCasesCount' => $this->getCasesCountByYear($year,'received')
        ]);
    }

    private function getCasesByYear(int $year) : array
    {
        $monthCounts = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthCounts[] = VictimCasesHistory::whereYear('created_at',$year)
                ->whereOrganizationId(organization()->id)
                ->whereMonth('created_at',$i)
                ->count();
        }
     return $monthCounts;
    }

    private  function getCasesCountByYear (int $year,string $type = 'cases') : object
    {
       $total  =  VictimCasesHistory::whereYear('created_at',$year);
       if($type === 'cases'){
           $total = $total->nonForwarded(auth()->user()->organization);
       }

       if($type === 'forwarded'){
           $total = $total->forwardedCases(auth()->user()->organization);
       }

       if ($type === 'received'){
           $total = $total->receivedCases(auth()->user()->organization);
       }

       return (object) [
           'total' => $total->count(),
           'done' => $total->whereProgressStatus(CaseProgressStatus::SOLVED->value)->count(),
           'pending' => $total->whereNot('progress_status','!=',CaseProgressStatus::SOLVED->value )->count()
       ];
    }
}
