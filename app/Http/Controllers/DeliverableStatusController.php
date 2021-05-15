<?php

namespace App\Http\Controllers;

use App\Interfaces\DeliverableStatusInterface;
use Illuminate\Http\Request;

class DeliverableStatusController extends Controller
{
    protected $deliverableStatusInterface;

    public function __construct(DeliverableStatusInterface $deliverableStatusInterface)
    {
        $this->deliverableStatusInterface = $deliverableStatusInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->deliverableStatusInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->deliverableStatusInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->deliverableStatusInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->deliverableStatusInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->deliverableStatusInterface->delete($id);
    }
}
