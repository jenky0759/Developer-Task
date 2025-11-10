<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IBaseRepository
{
    public function all(array $includes = null): Collection;

    public function getById(int $id, array $includes = null) : Model;

    public function create(array $attributes) : Model;

    public function update(int $id, array $attributes) : Model;

    public function delete(int $id) : bool;
}
