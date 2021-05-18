@extends('backend.layouts.app')

@section('title', __(' Test1S'))

@section('breadcrumb-links')
    @include('backend.test1.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang(' Test1S')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.test1.create')"
                :text="__('Create Test1')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:test1-table/>
        </x-slot>
    </x-backend.card>
@endsection