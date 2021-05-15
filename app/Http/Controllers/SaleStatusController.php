<?php

namespace App\Http\Controllers;

use App\Interfaces\SaleStatusInterface;
use Illuminate\Http\Request;

class SaleStatusController extends Controller
{
    protected $saleStatusInterface;

    public function __construct(SaleStatusInterface $saleStatusInterface)
    {
        $this->saleStatusInterface = $saleStatusInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->saleStatusInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->saleStatusInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->saleStatusInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->saleStatusInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->saleStatusInterface->delete($id);
    }
}
