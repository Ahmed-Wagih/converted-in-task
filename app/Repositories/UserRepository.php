<?php
namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $task)
    {
        $this->model = $task;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function statistics()
    {
        return$this->model->whereHas('tasks')
        ->withCount('tasks')
        ->orderBy('tasks_count', 'desc')
        ->limit(10)
        ->get();
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
            throw new ModelNotFoundException("User not found");
        }

        return $task;
    }
}
