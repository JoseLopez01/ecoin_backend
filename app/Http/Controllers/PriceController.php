<?php

namespace App\Http\Controllers;

use App\Interfaces\PriceInterface;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    protected $priceInterface;

    public function __construct(PriceInterface $priceInterface)
    {
        $this->priceInterface = $priceInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->priceInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->priceInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->priceInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->priceInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->priceInterface->delete($id);
    }
}
