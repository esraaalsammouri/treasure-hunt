<?php

namespace App\Domains\Country\Http\Controllers\Backend\Country;

use App\Http\Controllers\Controller;
use App\Domains\Country\Models\Country;
use App\Domains\Country\Services\CountryService;

/**
 * Class DeletedCountryController.
 */
class DeletedCountryController extends Controller
{
    /**
     * @var CountryService
     */
    protected $countryService;

    /**
     * DeletedCountryController constructor.
     *
     * @param  CountryService  $countryService
     */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.country.deleted');
    }

    /**
     * @param  Country  $deletedCountry
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Country $deletedCountry)
    {
        $this->countryService->restore($deletedCountry);

        return redirect()->route('admin.country.index')->withFlashSuccess(__('The  Countries was successfully restored.'));
    }

    /**
     * @param  Country  $deletedCountry
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Country $deletedCountry)
    {
        $this->countryService->destroy($deletedCountry);

        return redirect()->route('admin.country.deleted')->withFlashSuccess(__('The  Countries was permanently deleted.'));
    }
}