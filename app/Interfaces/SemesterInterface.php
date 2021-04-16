<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SemesterInterface
{

    /**
     * Gets all active resources
     *
     * @method GET
    */
    public function getAll();

    /**
     * Gets a single resource by its id
     *
     * @param Integer $id
     *
     * @method GET
    */
    public function getById(int $id);

    /**
     * Creates a new resource
     *
     * @param Request $request
    */
    public function create(Request $request);

    /**
     * Updates a existing resource
     *
     * @param Request $request
     * @param Integer $id
    */
    public function update(Request $request, int $id);

    /**
     * Deletes a existing resource
     *
     * @param Integer $id
    */
    public function delete(int $id);
}
