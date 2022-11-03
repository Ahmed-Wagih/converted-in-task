<?php
namespace App\Repositories;

use App\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminRepository implements AdminRepositoryInterface
{
    protected $model;

    public function __construct(Admin $task)
    {
        $this->model = $task;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginate()
    {
        return $this->model->paginate(10);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if (null == $task = $this->model->find($id)) {
            throw new ModelNotFoundException("Admin not found");
        }

        return $task;
    }
}
