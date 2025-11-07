<?php

namespace App\Repositories\Interfaces;
interface IBaseRepository
{
    public function all();

    public function getById(int $id);

    public function create(array $attributes);

    public function update(int $id, array $attributes);

    public function delete(int $id);
}
