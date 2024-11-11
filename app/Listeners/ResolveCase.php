<?php

namespace App\Listeners;

use App\Enums\CaseProgressStatus;
use App\Events\ResolveCaseEvent;
use App\Models\ForwardingCase;
use App\Models\VictimCase;

class ResolveCase
{

    /**
     * Handle the event.
     */
    public function handle(ResolveCaseEvent $event): void
    {
       VictimCase::where('id', $event->caseId)->update(['is_terminated' => true]);
       ForwardingCase::where('case_id', $event->caseId)->update(['status' =>CaseProgressStatus::SOLVED]);
    }
}
