<?php

namespace App\Domains\Test1\Http\Controllers\Backend\Test1;

use App\Http\Controllers\Controller;
use App\Domains\Test1\Models\Test1;
use App\Domains\Test1\Services\Test1Service;

/**
 * Class DeletedTest1Controller.
 */
class DeletedTest1Controller extends Controller
{
    /**
     * @var Test1Service
     */
    protected $test1Service;

    /**
     * DeletedTest1Controller constructor.
     *
     * @param  Test1Service  $test1Service
     */
    public function __construct(Test1Service $test1Service)
    {
        $this->test1Service = $test1Service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.test1.deleted');
    }

    /**
     * @param  Test1  $deletedTest1
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Test1 $deletedTest1)
    {
        $this->test1Service->restore($deletedTest1);

        return redirect()->route('admin.test1.index')->withFlashSuccess(__('The  Test1S was successfully restored.'));
    }

    /**
     * @param  Test1  $deletedTest1
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Test1 $deletedTest1)
    {
        $this->test1Service->destroy($deletedTest1);

        return redirect()->route('admin.test1.deleted')->withFlashSuccess(__('The  Test1S was permanently deleted.'));
    }
}