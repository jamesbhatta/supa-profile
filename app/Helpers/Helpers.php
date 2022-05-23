<?php

use App\Services\FiscalYearService;

if (!function_exists('setActive')) {
    /**
     * Check if the route is active or not
     *
     * @param  string  $key
     * @return string
     */
    function setActive($path, $active = 'active')
    {
        return Request::routeIs($path) ? $active : '';
    }
}

if (!function_exists('invalid_class')) {
    /**
     * Check for the existence of an error message and return a class name
     *
     * @param  string  $key
     * @return string
     */
    function invalid_class($key)
    {
        $errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;
        return $errors->has($key) ? 'is-invalid' : '';
    }
}


if (!function_exists('invalid_feedback')) {
    /**
     * Check if the route is active or not
     *
     * @param  string  $key
     * @return string
     */
    function invalid_feedback($key)
    {
        $key = str_replace(['\'', '"'], '', $key);
        $errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;
        if ($message = $errors->first($key)) {
            return '<?= <div class="invalid-feedback">' . $message . '</div>; ?';
        }
    }
}


function runningFiscalYear($key = null)
{
    $runningFiscalYear = app(FiscalYearService::class)->getRunning();

    return $key != null
        ? $runningFiscalYear->$key
        : $runningFiscalYear;
}


if (!function_exists('slashDateFormat')) {
    /**
     * Format the date to slash(/) format
     *
     * @param  mixed $date
     * @return void
     */
    function slashDateFormat($date)
    {
        return str_replace('-', '/', $date);
    }
}

if (!function_exists('copyCountText')) {
    function copyCountText($count)
    {
        switch ($count) {
            case 1:
                return 'प्रथम';
                break;
            case 2:
                return 'दोस्रो';
                break;
            case 3:
                return 'तेस्रो';
                break;
            case 4:
                return 'चौथो';
                break;
            case 5:
                return 'पाँचौं';
                break;
            default:
                return $count;
                break;
        }
    }
}

if (!function_exists('bs_to_ad')) {
    function bs_to_ad($npDate)
    {
        return \App\Helpers\BSDateHelper::BsToAd('-', $npDate);
    }
}

if (!function_exists('ad_to_bs')) {
    function ad_to_bs($enDate)
    {
        return \App\Helpers\BSDateHelper::AdToBsEn('-', $enDate);
    }
}
