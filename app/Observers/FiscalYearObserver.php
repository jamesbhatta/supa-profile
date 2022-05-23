<?php

namespace App\Observers;

use App\FiscalYear;
use PDO;

class FiscalYearObserver
{
    public function creating(FiscalYear $fiscalYear)
    {
        $fiscalYear->start_ad = bs_to_ad($fiscalYear->start);
        $fiscalYear->end_ad = bs_to_ad($fiscalYear->end);
    }

    /**
     * Handle the fiscal year "created" event.
     *
     * @param  \App\FiscalYear  $fiscalYear
     * @return void
     */
    public function created(FiscalYear $fiscalYear)
    {
        $this->syncActiveFiscalYear($fiscalYear);
    }

    public function updating(FiscalYear $fiscalYear)
    {
        $fiscalYear->start_ad = bs_to_ad($fiscalYear->start);
        $fiscalYear->end_ad = bs_to_ad($fiscalYear->end);
    }

    /**
     * Handle the fiscal year "updated" event.
     *
     * @param  \App\FiscalYear  $fiscalYear
     * @return void
     */
    public function updated(FiscalYear $fiscalYear)
    {
        $this->syncActiveFiscalYear($fiscalYear);
    }
    
    /**
     * Synchoronize the current fiscal year
     *
     * @param  mixed $fiscalYear
     * @return void
     */
    public function syncActiveFiscalYear(FiscalYear $fiscalYear)
    {
        if ($fiscalYear->is_running) {
            $this->inActiveExcept($fiscalYear);

            settings()->set([
                'fiscal_year' => $fiscalYear->name,
                'fiscal_year_start' => $fiscalYear->start,
                'fiscal_year_end' => $fiscalYear->end,
            ]);
        }
    }

    /**
     * Inactive the Fiscals except specifie
     *
     * @param  mixed $fiscalYear
     * @return void
     */
    public function inActiveExcept(FiscalYear $fiscalYear)
    {
        return FiscalYear::whereNotIn('id', [$fiscalYear->id])->update(['is_running' => false]);
    }
}
