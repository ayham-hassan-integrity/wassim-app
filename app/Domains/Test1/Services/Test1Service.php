<?php

namespace App\Domains\Test1\Services;

use App\Domains\Test1\Models\Test1;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class Test1Service.
 */
class Test1Service extends BaseService
{
    /**
     * Test1Service constructor.
     *
     * @param Test1 $test1
     */
    public function __construct(Test1 $test1)
    {
        $this->model = $test1;
    }

    /**
     * @param array $data
     *
     * @return Test1
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Test1
    {
        DB::beginTransaction();

        try {
            $test1 = $this->model::create([
                'name' => $data['name'],
                'mobile' => $data['mobile'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this test1. Please try again.'));
        }

        DB::commit();

        return $test1;
    }

    /**
     * @param Test1 $test1
     * @param array $data
     *
     * @return Test1
     * @throws \Throwable
     */
    public function update(Test1 $test1, array $data = []): Test1
    {
        DB::beginTransaction();

        try {
            $test1->update([
                'name' => $data['name'],
                'mobile' => $data['mobile'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this test1. Please try again.'));
        }

        DB::commit();

        return $test1;
    }

    /**
     * @param Test1 $test1
     *
     * @return Test1
     * @throws GeneralException
     */
    public function delete(Test1 $test1): Test1
    {
        if ($this->deleteById($test1->id)) {
            return $test1;
        }

        throw new GeneralException('There was a problem deleting this test1. Please try again.');
    }

    /**
     * @param Test1 $test1
     *
     * @return Test1
     * @throws GeneralException
     */
    public function restore(Test1 $test1): Test1
    {
        if ($test1->restore()) {
            return $test1;
        }

        throw new GeneralException(__('There was a problem restoring this  Test1S. Please try again.'));
    }

    /**
     * @param Test1 $test1
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Test1 $test1): bool
    {
        if ($test1->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this  Test1S. Please try again.'));
    }
}