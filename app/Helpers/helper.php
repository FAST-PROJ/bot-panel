<?php

use Carbon\Carbon;
use Carbon\CarbonInterval;

if (!function_exists('carbon_human_print')) {
    function carbon_human_print(int $seconds): string
    {
        Carbon::setLocale('pt_BR');
        $dateNow = Carbon::now();
        $days = $dateNow->diffInDays($dateNow->copy()->addSeconds($seconds));
        $hours = $dateNow->diffInHours($dateNow->copy()->addSeconds($seconds)->subDays($days));
        $minutes = $dateNow->diffInMinutes($dateNow->copy()->addSeconds($seconds)->subDays($days)->subHours($hours));
        return CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
    }
}