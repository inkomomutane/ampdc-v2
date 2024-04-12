<?php

use App\Models\VictimCodeGenerator;

if (!function_exists('organization')) {
    function organization(): ?\App\Data\OrganizationData
    {
        return auth()->user()?->organization->getData();
    }
}


if(!function_exists('generateCode')) {
    function generateCode(): string
    {
       $generator  =  VictimCodeGenerator::first();

         if(!$generator) {
              $generator = VictimCodeGenerator::create([
                'code' => 'FV',
                'index' => 1
              ]);
        return $generator->code . str_pad($generator->index, 6, '0', STR_PAD_LEFT);
         }
        return $generator->code . str_pad($generator->index, 6, '0', STR_PAD_LEFT);
    }
}

if(!function_exists('incrementCode')) {
    function incrementCode(): string
    {
        if(!$generator = VictimCodeGenerator::first()) {
            return generateCode();
        }
        ++$generator->index;
        $generator->save();
        $generator->refresh();
        return $generator->code . str_pad($generator->index, 6, '0', STR_PAD_LEFT);
    }
}
