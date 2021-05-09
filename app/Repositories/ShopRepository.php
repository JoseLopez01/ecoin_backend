<?php


namespace App\Repositories;


use App\Interfaces\ShopInterface;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use function Psy\sh;

class ShopRepository implements ShopInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $shops = Shop::where('is_active', '=', true)->get()->map->format();
            return $this->success('', $shops);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $shop = Shop::find($id);
            if (!$shop)
                return $this->error('Shop not found', 404);

            return $this->success('', $shop);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $shop = new Shop();
            $shop->class_id = $request->classid;
            $shop->save();

            return $this->success('Shop created', null, 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $shop = Shop::find($id);

            if (!$shop)
                return $this->error('Shop not found', 404);

            $shop->class_id = $request->classid;
            $shop->save();

            return $this->success('Shop updated');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $shop = Shop::find($id);

            if (!$shop)
                return $this->error('Shop not found', 404);

            $shop->is_active = false;
            $shop->save();

            return $this->success('Shop deleted');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
