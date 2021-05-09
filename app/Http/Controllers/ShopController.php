<?php

namespace App\Http\Controllers;

use App\Interfaces\ShopInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $shopInterface;

    public function __construct(ShopInterface $shopInterface)
    {
        $this->shopInterface = $shopInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->shopInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->shopInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->shopInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->shopInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->shopInterface->delete($id);
    }
}
