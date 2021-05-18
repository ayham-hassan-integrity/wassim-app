@extends('backend.layouts.app')

@section('title', __('View Test1'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Test1')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.test1.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('id')</th>
                    <td>{{   $test1->id }}</td>
                </tr>
                <tr>
                    <th>@lang('name')</th>
                    <td>{{   $test1->name }}</td>
                </tr>
                <tr>
                    <th>@lang('mobile')</th>
                    <td>{{   $test1->mobile }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Test1 Created'):</strong> @displayDate($test1->created_at) ({{   $test1->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($test1->updated_at) ({{   $test1->updated_at->diffForHumans() }})

                @if($test1->trashed())
                    <strong>@lang('Test1 Deleted'):</strong> @displayDate($test1->deleted_at) ({{   $test1->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection