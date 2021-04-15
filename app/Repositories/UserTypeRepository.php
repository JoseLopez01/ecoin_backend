<?php


namespace App\Repositories;

use App\Interfaces\UserTypeInterface;
use App\Traits\ResponseAPI;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeRepository implements UserTypeInterface
{

    use ResponseAPI;

    public function getAll()
    {
        try {
            $userTypes = UserType::where('isactive', '=', true)->get();
            return $this->success('All user types', $userTypes);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById($id)
    {
        try {
            $userType = UserType::find($id)->get();

            if (!$userType)
                return $this->error('No user type found', 404);

            return $this->success('User type', $userType);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'description' => 'required|string|unique:user_types'
            ]);
            $userType = new UserType();
            $userType->description = $request->description;
            $userType->save();
            return $this->success('User type created', null, 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $userType = UserType::find($id);
            if (!$userType)
                return $this->error('User type does not exits', 404);
            $userType->description = $request->description;
            $userType->save();
            return $this->success('User types updated', null);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $userType = UserType::find($id);
            if (!$userType)
                return $this->error('User type does not exits', 404);
            $userType->is_active = false;
            $userType->save();
            return $this->success('User types deleted', null);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
