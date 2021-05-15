<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CourseInterface {

    /**
     * Gets all active resources
     * @method GET
    */
    public function getAll();

    /**
     * Get a single resource by id
     * @method GET
    */
    public function getById(int $id);

    /**
     * Creates a new resource
     * @method POST
    */
    public function create(Request $request);

    /**
     * Updates a existing resource
     * @method PUT
    */
    public function update(Request $request, int $id);

    /**
     * Deletes a existing resource
     * @method DELETE
    */
    public function delete(int $did);

    /**
     * Gets schedules related to a course
     *
     * @method GET
    */
    public function getSchedules($classId);

    /**
     * Gets students registered in a class
     *
     * @method GET
    */
    public function getStudents($classId);

    /**
     * Gets shop related to a course
     *
     * @method GET
    */
    public function getClassShop($classId);
}
