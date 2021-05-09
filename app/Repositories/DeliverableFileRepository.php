<?php


namespace App\Repositories;


use App\Interfaces\DeliverableFileInterface;
use App\Models\DeliverableFile;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;

class DeliverableFileRepository implements DeliverableFileInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $files = DeliverableFile::where('is_active', '=', true)->get()->map->format();
            return $this->success('All files', $files);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $file = DeliverableFile::find($id);

            if (!$file)
                return $this->error('File not found', 404);

            return $this->success('', $file);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $file = new DeliverableFile();
            $file->name = $request->name;
            $file->save();

            return $this->success('File created', 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $file = DeliverableFile::find($id);

            if (!$file)
                return $this->error('File not found', 404);

            $file->name = $request->name;
            $file->save();

            return $this->success('File updated');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $file = DeliverableFile::find($id);

            if (!$file)
                return $this->error('File not found', 404);

            $file->is_active = false;
            $file->save();

            return $this->success('File deleted');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
