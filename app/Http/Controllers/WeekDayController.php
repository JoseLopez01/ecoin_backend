<?php

namespace App\Http\Controllers;

use App\Interfaces\WeekDayInterface;
use Illuminate\Http\Request;

class WeekDayController extends Controller
{
    protected $weekDayInterface;

    public function __construct(WeekDayInterface $weekDayInterface)
    {
        $this->weekDayInterface = $weekDayInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->weekDayInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->weekDayInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->weekDayInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->weekDayInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->weekDayInterface->delete($id);
    }
}
