<?php

namespace App\Http\Controllers;

use App\Interfaces\DeliverableFileInterface;
use Illuminate\Http\Request;

class DeliverableFileController extends Controller
{
    protected $deliverableFileInterface;

    public function __construct(DeliverableFileInterface $deliverableFileInterface)
    {
        $this->deliverableFileInterface = $deliverableFileInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->deliverableFileInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->deliverableFileInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->deliverableFileInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->deliverableFileInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->deliverableFileInterface->delete($id);
    }

    /**
     * Gets deliverable related a file
     *
     * @method GET
     */
    public function getDeliverable(int $fileId)
    {
        return $this->deliverableFileInterface->getDeliverable($fileId);
    }
}
