<?php

namespace App\Domains\Test1\Http\Controllers\Backend\Test1;

use App\Http\Controllers\Controller;
use App\Domains\Test1\Models\Test1;
use App\Domains\Test1\Services\Test1Service;
use App\Domains\Test1\Http\Requests\Backend\Test1\DeleteTest1Request;
use App\Domains\Test1\Http\Requests\Backend\Test1\EditTest1Request;
use App\Domains\Test1\Http\Requests\Backend\Test1\StoreTest1Request;
use App\Domains\Test1\Http\Requests\Backend\Test1\UpdateTest1Request;

/**
 * Class Test1Controller.
 */
class Test1Controller extends Controller
{
    /**
     * @var Test1Service
     */
    protected $test1Service;

    /**
     * Test1Controller constructor.
     *
     * @param Test1Service $test1Service
     */
    public function __construct(Test1Service $test1Service)
    {
        $this->test1Service = $test1Service;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.test1.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.test1.create');
    }

    /**
     * @param StoreTest1Request $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreTest1Request $request)
    {
        $test1 = $this->test1Service->store($request->validated());

        return redirect()->route('admin.test1.show', $test1)->withFlashSuccess(__('The  Test1S was successfully created.'));
    }

    /**
     * @param Test1 $test1
     *
     * @return mixed
     */
    public function show(Test1 $test1)
    {
        return view('backend.test1.show')
            ->withTest1($test1);
    }

    /**
     * @param EditTest1Request $request
     * @param Test1 $test1
     *
     * @return mixed
     */
    public function edit(EditTest1Request $request, Test1 $test1)
    {
        return view('backend.test1.edit')
            ->withTest1($test1);
    }

    /**
     * @param UpdateTest1Request $request
     * @param Test1 $test1
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateTest1Request $request, Test1 $test1)
    {
        $this->test1Service->update($test1, $request->validated());

        return redirect()->route('admin.test1.show', $test1)->withFlashSuccess(__('The  Test1S was successfully updated.'));
    }

    /**
     * @param DeleteTest1Request $request
     * @param Test1 $test1
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteTest1Request $request, Test1 $test1)
    {
        $this->test1Service->delete($test1);

        return redirect()->route('admin.$test1.deleted')->withFlashSuccess(__('The  Test1S was successfully deleted.'));
    }
}