<?php

namespace App\Domains\Country\Http\Controllers\Backend\Country;

use App\Http\Controllers\Controller;
use App\Domains\Country\Models\Country;
use App\Domains\Country\Services\CountryService;
use App\Domains\Country\Http\Requests\Backend\Country\DeleteCountryRequest;
use App\Domains\Country\Http\Requests\Backend\Country\EditCountryRequest;
use App\Domains\Country\Http\Requests\Backend\Country\StoreCountryRequest;
use App\Domains\Country\Http\Requests\Backend\Country\UpdateCountryRequest;

/**
 * Class CountryController.
 */
class CountryController extends Controller
{
    /**
     * @var CountryService
     */
    protected $countryService;

    /**
     * CountryController constructor.
     *
     * @param CountryService $countryService
     */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.country.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.country.create');
    }

    /**
     * @param StoreCountryRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreCountryRequest $request)
    {
        $country = $this->countryService->store($request->validated());

        return redirect()->route('admin.country.show', $country)->withFlashSuccess(__('The  Countries was successfully created.'));
    }

    /**
     * @param Country $country
     *
     * @return mixed
     */
    public function show(Country $country)
    {
        return view('backend.country.show')
            ->withCountry($country);
    }

    /**
     * @param EditCountryRequest $request
     * @param Country $country
     *
     * @return mixed
     */
    public function edit(EditCountryRequest $request, Country $country)
    {
        return view('backend.country.edit')
            ->withCountry($country);
    }

    /**
     * @param UpdateCountryRequest $request
     * @param Country $country
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $this->countryService->update($country, $request->validated());

        return redirect()->route('admin.country.show', $country)->withFlashSuccess(__('The  Countries was successfully updated.'));
    }

    /**
     * @param DeleteCountryRequest $request
     * @param Country $country
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteCountryRequest $request, Country $country)
    {
        $this->countryService->delete($country);

        return redirect()->route('admin.$country.deleted')->withFlashSuccess(__('The  Countries was successfully deleted.'));
    }
}