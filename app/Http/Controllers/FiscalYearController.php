<?php

namespace App\Http\Controllers;

use App\FiscalYear;
use App\Http\Requests\FiscalYearRequest;
use App\Services\FiscalYearService;

class FiscalYearController extends Controller
{
    protected $fiscalYearService;

    public function __construct(FiscalYearService $fiscalYearService)
    {
        $this->fiscalYearService = $fiscalYearService;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fiscalYear = null)
    {
        $fiscalYear = $fiscalYear
            ? FiscalYear::findOrFail($fiscalYear)
            : new FiscalYear();

        $fiscalYears = FiscalYear::latest()->get();

        return view('fiscal_year.index', compact('fiscalYears', 'fiscalYear'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FiscalYearRequest $request)
    {
        // AD dates are saved using observer
        FiscalYear::create($request->validated());
        $this->fiscalYearService->flushCache();

        return redirect()->route('fiscal-year.index')->with('success', 'Data Saved');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FiscalYear  $fiscalYear
     * @return \Illuminate\Http\Response
     */
    public function update(FiscalYearRequest $request, FiscalYear $fiscalYear)
    {
        $fiscalYear->update($request->validated());
        $this->fiscalYearService->flushCache();

        return redirect()->route('fiscal-year.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FiscalYear  $fiscalYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(FiscalYear $fiscalYear)
    {
        if ($fiscalYear->is_running) {
            return redirect()->route('fiscal-year.index')->with('error', 'Current running fiscal year cannot be deleted');
        }

        $fiscalYear->delete();
        $this->fiscalYearService->flushCache();

        return redirect()->route('fiscal-year.index')->with('success', 'Record Deleted');
    }
}
