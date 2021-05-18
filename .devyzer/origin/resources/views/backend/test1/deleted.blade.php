@extends('backend.layouts.app')

@section('title', __('Deleted Test1s'))

@section('breadcrumb-links')
    @include('backend.test1.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Test1s')
        </x-slot>

        <x-slot name="body">
            <livewire:test1-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection