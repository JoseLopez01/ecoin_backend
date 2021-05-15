<?php

namespace App\Http\Controllers;

use App\Interfaces\ActivityInterface;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    protected $activityInterface;

    public function __construct(ActivityInterface $activityInterface)
    {
        $this->activityInterface = $activityInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->activityInterface->getAll();
    }

    /**
     * Gets a single resource
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->activityInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @methos POST
     */
    public function create(Request $request)
    {
        return $this->activityInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->activityInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->activityInterface->delete($id);
    }

    /**
     * Gets all activities for a class
     *
     * @method GET
     */
    public function getActivityClass(int $id)
    {
        return $this->activityInterface->getClassActivities($id);
    }

    /**
     * Gets deliverables by status
     *
     * @method GET
     */
    public function getDeliverablesByStatus(int $activityId, int $deliverableStatus)
    {
        return $this->activityInterface->getDeliverablesByStatus($activityId, $deliverableStatus);
    }
}
