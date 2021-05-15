<?php

namespace App\Http\Controllers;

use App\Interfaces\SaleHeaderInterface;
use Illuminate\Http\Request;

class SaleHeaderController extends Controller
{
    protected $saleHeaderInterface;

    public function __construct(SaleHeaderInterface $saleHeaderInterface)
    {
        $this->saleHeaderInterface = $saleHeaderInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->saleHeaderInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->saleHeaderInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->saleHeaderInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->saleHeaderInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->saleHeaderInterface->delete($id);
    }

    /**
     * Get status
     *
     * @method GET
     */
    public function getStatus($saleId)
    {
        return $this->saleHeaderInterface->getStatus($saleId);
    }

    /**
     * Gets details for a sale
     *
     * @method GET
     */
    public function getDetails($saleId)
    {
        return $this->saleHeaderInterface->getDetails($saleId);
    }
}
