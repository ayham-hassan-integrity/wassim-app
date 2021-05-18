<?php

use App\Domains\Test1\Http\Controllers\Backend\Test1\DeletedTest1Controller;
use App\Domains\Test1\Http\Controllers\Backend\Test1\Test1Controller;
use App\Domains\Test1\Models\Test1;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'test1',
    'as' => 'test1.',
], function () {

    Route::get('/', [Test1Controller::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__(' Test1S'), route('admin.test1.index'));
        });


    Route::get('deleted', [DeletedTest1Controller::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.test1.index')
                ->push(__('Deleted  Test1S'), route('admin.test1.deleted'));
        });


    Route::get('create', [Test1Controller::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.test1.index')
                ->push(__('Create Test1'), route('admin.test1.create'));
        });

    Route::post('/', [Test1Controller::class, 'store'])->name('store');

    Route::group(['prefix' => '{test1}'], function () {
        Route::get('/', [Test1Controller::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Test1 $test1) {
                $trail->parent('admin.test1.index')
                    ->push($test1->id, route('admin.test1.show', $test1));
            });

        Route::get('edit', [Test1Controller::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Test1 $test1) {
                $trail->parent('admin.test1.show', $test1)
                    ->push(__('Edit'), route('admin.test1.edit', $test1));
            });

        Route::patch('/', [Test1Controller::class, 'update'])->name('update');
        Route::delete('/', [Test1Controller::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedTest1}'], function () {
        Route::patch('restore', [DeletedTest1Controller::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedTest1Controller::class, 'destroy'])->name('permanently-delete');
    });
});