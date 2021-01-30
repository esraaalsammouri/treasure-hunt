@extends('backend.layouts.app')

@section('title', __('View Country'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Country')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.country.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('id')</th>
                    <td>{{   $country->id }}</td>
                </tr>
                <tr>
                    <th>@lang('code')</th>
                    <td>{{   $country->code }}</td>
                </tr>
                <tr>
                    <th>@lang('icon')</th>
                    <td>{{   $country->icon }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Country Created'):</strong> @displayDate($country->created_at) ({{   $country->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($country->updated_at) ({{   $country->updated_at->diffForHumans() }})

                @if($country->trashed())
                    <strong>@lang('Country Deleted'):</strong> @displayDate($country->deleted_at) ({{   $country->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection