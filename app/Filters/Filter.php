<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Filter
{
    protected $mapOperators = [];
    protected $mapColumns = [];
    protected $safeParams = [];
    protected $datetime = [];
    protected $query = [];

    public function setQuery(Request $request): array
    {

        foreach ($request->query as $key => $value) {

            $operator = key($value);

            if (!$this->isSafeParam($key, $value) &&  !$this->isSafeOperator($operator, $key)) {
                continue;
            }

            foreach ($value as $operator => $data) {

                $key = $this->mapFiltersToColumnName($key);

                if ($this->isDateColumn($key) && $this->isDateFormat($data)) {
                    $data = $this->convertDateParams($data);
                }

                $this->addQuery($key, $this->mapOperators[$operator], $data);
            }
        }
        return $this->query;
    }


    protected function isSafeOperator($operator, $filterName)
    {
       return  in_array($operator, $this->safeParams[$filterName]);
    }

    protected function isSafeParam($parameterName, $paramValue)
    {
       return  array_key_exists($parameterName, $this->safeParams) || !is_array($paramValue);
    }

    protected function mapFiltersToColumnName($filterName)
    {
       return (array_key_exists($filterName, $this->mapColumns)) ? $this->mapColumns[$filterName] : $filterName;

    }
    protected function isDateColumn($columnName)
    {
        return in_array($columnName, $this->dateTimeColumns);
    }

    protected function isDateFormat($data)
    {
        return preg_match('/^[\d]{2}[\d]{2}[[0-9]{4}$/', $data);
    }

    protected function convertDateParams($date)
    {
        return Carbon::createFromFormat('dmY',$date);
    }

    protected function addQuery(string $columnName, string $operator, string $value): void
    {
        $this->query[] = [$columnName, $operator, $value ];
    }


}
