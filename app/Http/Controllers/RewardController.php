<?php

namespace App\Http\Controllers;

use App\Interfaces\RewardInterface;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    protected $rewardInterface;

    public function __construct(RewardInterface $rewardInterface)
    {
        $this->rewardInterface = $rewardInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->rewardInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->rewardInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->rewardInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->rewardInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->rewardInterface->delete($id);
    }
}
