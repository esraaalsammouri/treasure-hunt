<?php

namespace App\Domains\Country\Services;

use App\Domains\Country\Models\Country;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class CountryService.
 */
class CountryService extends BaseService
{
    /**
     * CountryService constructor.
     *
     * @param Country $country
     */
    public function __construct(Country $country)
    {
        $this->model = $country;
    }

    /**
     * @param array $data
     *
     * @return Country
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Country
    {
        DB::beginTransaction();

        try {
            $country = $this->model::create([
                'code' => $data['code'],
                'icon' => $data['icon'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this country. Please try again.'));
        }

        DB::commit();

        return $country;
    }

    /**
     * @param Country $country
     * @param array $data
     *
     * @return Country
     * @throws \Throwable
     */
    public function update(Country $country, array $data = []): Country
    {
        DB::beginTransaction();

        try {
            $country->update([
                'code' => $data['code'],
                'icon' => $data['icon'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this country. Please try again.'));
        }

        DB::commit();

        return $country;
    }

    /**
     * @param Country $country
     *
     * @return Country
     * @throws GeneralException
     */
    public function delete(Country $country): Country
    {
        if ($this->deleteById($country->id)) {
            return $country;
        }

        throw new GeneralException('There was a problem deleting this country. Please try again.');
    }

    /**
     * @param Country $country
     *
     * @return Country
     * @throws GeneralException
     */
    public function restore(Country $country): Country
    {
        if ($country->restore()) {
            return $country;
        }

        throw new GeneralException(__('There was a problem restoring this  Countries. Please try again.'));
    }

    /**
     * @param Country $country
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Country $country): bool
    {
        if ($country->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this  Countries. Please try again.'));
    }
}