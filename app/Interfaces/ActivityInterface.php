<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface  ActivityInterface {

    /**
     * Gets all active resources
     *
     * @method GET
    */
    public function getAll();

    /**
     * Gets a single resource
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
     * Gets all activities for a class
     *
     * @method GET
    */
    public function getActivityClass(int $id);

    /**
     * Gets deliverables by status
     *
     * @method GET
    */
    public function getDeliverablesByStatus(int $activityId, int $deliverableStatus);
}
