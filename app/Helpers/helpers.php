<?php

if (!function_exists('organization')) {
    function organization(): \App\Data\OrganizationData
    {
        return auth()->user()->organization->getData();
    }
}
