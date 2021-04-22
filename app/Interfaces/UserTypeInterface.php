<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserTypeInterface {

    /*
     * Gets all resources
     *
     * @method GET
     * */
    public function getAll();

    /*
     * Gets single resource by id
     *
     * @param   integer     $id
     *
     * @method GET
     * */
    public function getById($id);

    /*
     * Creates a new single resource
     *
     * @param Illuminate\Http\Request   $request
     *
     * @method POST
     * */
    public function create(Request $request);

    /*
     * Updated a existing single resource
     *
     * @param Illuminate\Http\Request   $request
     * @param integer                   $id
     *
     * @method PUT
     * */
    public function update(Request $request, $id);

    /*
     * Deletes a existing single resource
     *
     * @param integer   $id
     *
     * @method delete
     * */
    public function delete($id);
}
