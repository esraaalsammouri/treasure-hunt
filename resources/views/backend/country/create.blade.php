@extends('backend.layouts.app')

@section('title', __('Create Country'))

@section('content')
    <x-forms.post :action="route('admin.country.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Country')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.country.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="code" class="col-md-2 col-form-label">@lang('code')</label>

                    <div class="col-md-10">
                        <input type="text" name="code" class="form-control" placeholder="{{  __('code') }} " value="{{  old('code') }} "  />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="icon" class="col-md-2 col-form-label">@lang('icon')</label>

                    <div class="col-md-10">
                        <input type="text" name="icon" class="form-control" placeholder="{{  __('icon') }} " value="{{  old('icon') }} "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Country')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection