<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CourseScheduleInterface {

    /**
     * Gets all active resources
     *
     * @method GET
    */
    public function getAll();

    /**
     * Gets a single resource by its ID
     *
     * @method GET
    */
    public function getById(int $id);

    /**
     * Creates a new resource
     *
     * @method POST
    */
    public function create(Request $request);

    /**
     * Updates a existing resource
     *
     * @method PUT
    */
    public function update(Request $request, int $id);

    /**
     * Deletes a existing resource
     *
     * @method DELETE
    */
    public function delete(int $id);

    /**
     * Gets course related to a schedule
     *
     * @method GET
    */
    public function getCourse($scheduleId);

    /**
     * Gets weekday related to a schedule
    */
    public function getWeekDay($scheduleId);
}
