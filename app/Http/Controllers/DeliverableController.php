<?php

namespace App\Http\Controllers;

use App\Interfaces\DeliverableInterface;
use Illuminate\Http\Request;

class DeliverableController extends Controller
{
    protected $deliverableInterface;

    public function __construct(DeliverableInterface $deliverableInterface)
    {
        $this->deliverableInterface = $deliverableInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->deliverableInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->deliverableInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->deliverableInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->deliverableInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->deliverableInterface->delete($id);
    }

    /**
     * Gets status of a deliverable
     *
     * @method GET
     */
    public function getStatus(int $deliverableId)
    {
        return $this->deliverableInterface->getStatus($deliverableId);
    }

    /**
     * Gets files related to a deliverable
     *
     * @method GET
     */
    public function getFiles(int $deliverableId)
    {
        return $this->deliverableInterface->getFiles($deliverableId);
    }
}
