@extends('backend.layouts.app')

@section('title', __('Deleted Countrys'))

@section('breadcrumb-links')
    @include('backend.country.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Countrys')
        </x-slot>

        <x-slot name="body">
            <livewire:country-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection