<?php


namespace App\Repositories;


use App\Interfaces\RewardInterface;
use App\Models\Reward;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;

class RewardRepository implements RewardInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $rewards = Reward::where('is_active', '=', true);
            return $this->success('', $rewards);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $reward = Reward::find($id);

            if (!$reward)
                return $this->error('Reward not found', 404);

            return $this->success('', $reward);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $reward = new Reward();
            $reward->shop_id = $request->shopid;
            $reward->name = $request->name;
            $reward->description = $request->description;
            $reward->save();

            return $this->success('Reward created', 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $reward = Reward::find($id);

            if (!$reward)
                return $this->error('Reward not found', 404);

            $reward->name = $request->name;
            $reward->description = $request->description;
            $reward->save();

            return $this->success('Reward updated');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $reward = Reward::find($id);

            if (!$reward)
                return $this->error('Reward not found', 404);

            $reward->is_active = false;
            $reward->save();

            return $this->success('Reward deleted');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
