<?php

namespace App\Repositories;

use App\Models\Tasks;

class TasksRepository
{
    public static function create(array $data)
    {
        return Tasks::create($data);
    }

    public static function findById(string $id)
    {
        return Tasks::where('id', $id)->first();
    }

    public static function update(string $id, array $data)
    {
        return Tasks::where('id', $id)->update($data);
    }

    public static function delete(string $id)
    {
        return Tasks::where('id', $id)->delete();
    }

    public static function find()
    {
        return Tasks::all();
    }
}
