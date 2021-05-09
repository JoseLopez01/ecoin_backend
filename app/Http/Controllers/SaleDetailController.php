<?php

namespace App\Http\Controllers;

use App\Interfaces\SaleDetailInterface;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    protected $saleDetailInterface;

    public function __construct(SaleDetailInterface $saleDetailInterface)
    {
        $this->saleDetailInterface = $saleDetailInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->saleDetailInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->saleDetailInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->saleDetailInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->saleDetailInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->saleDetailInterface->delete($id);
    }
}
