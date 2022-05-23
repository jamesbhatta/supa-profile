<?php

namespace App\Services;

use App\FiscalYear;
use Illuminate\Support\Facades\Cache;

class FiscalYearService
{    
    /**
     * Cache Key
     *
     * @var string
     */
    protected $fiscalYearsCacheKey = 'fiscal-years';

    /**
     * Selection Fields
     *
     * @var array
     */
    protected $selectFields = ['name', 'start', 'start_ad', 'end', 'end_ad'];

    /**
     * Get all fiscal years
     *
     * @return mixed
     */
    public function get($fresh = false)
    {
        return $fresh
            ? $this->modelQuery()
            : Cache::remember($this->getFiscalYearsCacheKey(), now()->addMinutes(30), function () {
                return $this->modelQuery();
            });
    }

    public function getRunning()
    {
        return FiscalYear::running()->firstOrFail($this->getSelectFields());
    }

    /**
     * Flush fiscal years cache
     *
     * @return bool
     */
    public  function flushCache()
    {
        return Cache::forget($this->getFiscalYearsCacheKey());
    }

    /**
     * Get the fiscal years cache key
     *
     * @return string
     */
    protected function getFiscalYearsCacheKey()
    {
        return $this->fiscalYearsCacheKey;
    }
    
    /**
     * Get the query
     *
     * @return eloquent
     */
    public function modelQuery()
    {
        return FiscalYear::select($this->getSelectFields())->latest()->get();
    }
    
    /**
     * Get all the fields to be selected
     *
     * @return void
     */
    public function getSelectFields()
    {
        return $this->selectFields;
    }
}
    