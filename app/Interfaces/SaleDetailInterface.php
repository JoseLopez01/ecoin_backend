<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SaleDetailInterface {

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll();

    /**
     * Gets a single resource by its id
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
}
