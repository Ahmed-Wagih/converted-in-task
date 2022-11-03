<?php
namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class TaskRepository implements TaskRepositoryInterface
{
    protected $model;

    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function all()
    {
        return $this->model->all();
    }


    public function paginate()
    {
        return $this->model->orderBy('id', 'desc')->paginate(10);
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
            throw new ModelNotFoundException("Task not found");
        }

        return $task;
    }
}
