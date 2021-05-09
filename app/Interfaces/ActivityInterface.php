<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface  ActivityInterface {

    /**
     * Gets all active resources
     *
     * @method GET
    */
    public function getAll();

    /**
     * Gets a single resource
     *
     * @method GET
    */
    public function getById(int $id);

    /**
     * Creates a new resource
     *
     * @methos POST
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
