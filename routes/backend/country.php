<?php

use App\Domains\Country\Http\Controllers\Backend\Country\DeletedCountryController;
use App\Domains\Country\Http\Controllers\Backend\Country\CountryController;
use App\Domains\Country\Models\Country;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'country',
    'as' => 'country.',
], function () {

    Route::get('/', [CountryController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__(' Countries'), route('admin.country.index'));
        });


    Route::get('deleted', [DeletedCountryController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.country.index')
                ->push(__('Deleted  Countries'), route('admin.country.deleted'));
        });


    Route::get('create', [CountryController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.country.index')
                ->push(__('Create Country'), route('admin.country.create'));
        });

    Route::post('/', [CountryController::class, 'store'])->name('store');

    Route::group(['prefix' => '{country}'], function () {
        Route::get('/', [CountryController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Country $country) {
                $trail->parent('admin.country.index')
                    ->push($country->title, route('admin.country.show', $country));
            });

        Route::get('edit', [CountryController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Country $country) {
                $trail->parent('admin.country.show', $country)
                    ->push(__('Edit'), route('admin.country.edit', $country));
            });

        Route::patch('/', [CountryController::class, 'update'])->name('update');
        Route::delete('/', [CountryController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedCountry}'], function () {
        Route::patch('restore', [DeletedCountryController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedCountryController::class, 'destroy'])->name('permanently-delete');
    });
});