<?php

namespace App\Filters;

use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Request;

class EventFilter extends Filter
{
    protected $safeParams = [
        'status' => ["eq"],
        'startDate' => ["lt","gt",'eq'],
        'endDate' => ["lt","gt",'eq']
    ];

    protected $mapColumns = [
        'startDate' => 'start_date',
        'endDate' => 'end_date'
    ];

    protected $mapOperators = [
        "eq" => "=",
        "lt" => "<",
        "gt" => ">"
    ];

    protected $dateTimeColumns = [
        'start_date',
        'end_date'
    ];



}
