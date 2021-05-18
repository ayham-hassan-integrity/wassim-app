@extends('backend.layouts.app')

@section('title', __('Update Test1'))

@section('content')
    <x-forms.patch :action="route('admin.test1.update', $test1)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Test1')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.test1.index')" :text="__('Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('name')</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{  __('name') }} " value="{{   $test1->title }}  "  />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="mobile" class="col-md-2 col-form-label">@lang('mobile')</label>

                    <div class="col-md-10">
                        <input type="text" name="mobile" class="form-control" placeholder="{{  __('mobile') }} " value="{{   $test1->title }}  "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Test1')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection