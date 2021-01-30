@extends('backend.layouts.app')

@section('title', __(' Countries'))

@section('breadcrumb-links')
    @include('backend.country.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang(' Countries')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.country.create')"
                :text="__('Create Country')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:country-table/>
        </x-slot>
    </x-backend.card>
@endsection