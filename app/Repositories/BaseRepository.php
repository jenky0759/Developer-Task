<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected Model $model;

    function __construct(Model $model)
    {
        $this->model = $model;
    }

    // should really be doing a paged list
    public function all(array $includes = null): Collection
    {
        $query = $this->model->query();

        $this->addIncludesToQuery($query, $includes);

        return $query->get();
    }

    public function getById(int $id, array $includes = null) : Model
    {
        $query = $this->model->query();

        $this->addIncludesToQuery($query, $includes);

        return $query->findOrFail($id);
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
        return $this->model->query()->where('id', $id)->delete();
    }

    protected function addIncludesToQuery($query, array $includes = null): void
    {
        if($includes !== null && count($includes) > 0){
            foreach($includes as $include){
                $query->with($include);
            }
        }
    }
}
