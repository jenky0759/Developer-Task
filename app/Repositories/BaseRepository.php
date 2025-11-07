<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected Model $model;

    function __construct(Model $model)
    {
        $this->model = $model;
    }

    // should really be doing a paged list
    public function all()
    {
        return $this->model->all();
    }

    public function getById(int $id) : Model
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes) : Model
    {
        return $this->model->create($attributes);
    }

    public function update(int $id, array $attributes) : Model
    {
        $model = $this->getById($id);

        $model->update($attributes);

        return $model;
    }

    public function delete(int $id) : bool
    {
        return $this->model->where('id', $id)->delete();
    }
}
